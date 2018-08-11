<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Training;
use App\Models\TrainingPackage;
use App\Models\Payment;
use App\Models\PaymentTrainingPlan;
use App\Models\PaymentTrainingSubscription;
use App\Models\PaymentTrainingFulfillment;
use App\Models\PaymentTrainingPlanDetail;

use Braintree_Transaction;
use CoinGate\CoinGate;

use Session;
use DB;

class TrainingPaymentController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('guest', ['except'=>['process', 'coingateProcess', 'coingateSuccess', 'orderSuccess'] ]);
    } 
    
    public function orderSuccess()
    {
        $payment_detail = PaymentTrainingFulfillment::find( Session::get('session_training_fulfillment.id') );   
        
        $subscription = $payment_detail->subscription;
        $user = User::find( $subscription->user_id );
        $invoice = $payment_detail->invoice_id;
        $training = $subscription->training_plan->training_package->training;
        $training_plan = $subscription->training_plan;
        $total = $training_plan->training_package->price;
        $amount_paid = $payment_detail->amount_paid;
        
        
        return view('payments.training_success', compact('subscription', 'user', 'invoice', 'training', 'training_plan', 'total', 'amount_paid') );
    }

   // checkout
    public function coingateProcess( Request $request )
    {
        //dd( $request->all() );
        //your app_id
        $app_id = "2454";
        
        //your app_key
        $api_key = "uAQiyqT0OWrgJwRm9765MS";
        
        //your api_secret
        $api_secret = "bUDKRoXmeHwY2ZkzBaFI0OrJE95ci4S8";
        
        //currency you want to pay
        $currency = "usd";
        
        //currency you want to receive
        $receive_currency = "usd";
        
        $o = $this->createOrder( 'coingate' );
        
        //Package -> coingate-php
        
        \CoinGate\CoinGate::config(array(
            'environment'               => 'sandbox', // sandbox OR live
            'auth_token'                => '_53DtZR3xTtULjNMdsNd5wdr75EVjX8mJ2Cat_w-',
            'curlopt_ssl_verifypeer'    => TRUE // default is false
        ));
        
        $post_params = array(
            'order_id'          =>  $o->id,
            'price_amount'      => $o->amount_paid,
            'price_currency'    => 'USD',
            'receive_currency'  => 'USD',
            'callback_url'      => route('training_payment.coingatecallback'),
            'cancel_url'        => route('training_payment_info'),
            'success_url'       => route('training_payment.coingatesuccess'),
            'title'             => 'Order ' . $o->id,
            'description'       => 'Traininig from Honeydrops',
            'token' =>  request('_token')
       );
        
        $order = \CoinGate\Merchant\Order::create($post_params);
        
        if ($order) 
        {
          return redirect($order->payment_url);
        } 
        else
        {
            $this->deleteOrder( $o );
            
            return back()->withErrors([
                "message" => "Failure to connect"
            ]);
        }
        
    }
    
    public function coingateSuccess( Request $request )
    {
        return redirect()->route('training_payment.success');
    }


    public function coingateCallback( Request $request) 
    {
        $order = PaymentTrainingFulfillment::find($request->input('order_id'));


        if ($request->input('token') == $order->token) 
        {
            $status = NULL;
            
            if ($request->input('status') == 'paid') 
            {
                if ($request->input('price_amount') >= $order->amount_paid) {
     
                    $status = 'paid';
                    
					$payment_type = 2;
				
					$curl = curl_init();

					curl_setopt_array($curl, array(
						CURLOPT_URL => "https://api-sandbox.coingate.com/v2/orders/" . $request->input('id'),
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => "",
						CURLOPT_TIMEOUT => 30000,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "GET",
						CURLOPT_HTTPHEADER => array(
							// Set Here Your Requesred Headers
							'Content-Type: application/json',
							'Authorization: Token _53DtZR3xTtULjNMdsNd5wdr75EVjX8mJ2Cat_w-',
						),
					));
					$response = curl_exec($curl);
					$err = curl_error($curl);
					curl_close($curl);

					if ($err) {
						echo "cURL Error #:" . $err;
					} else {
						print_r(json_decode($response));
					}
					
					$this->confirmOrder( $response, $order, $payment_type );
                }
            }
            else {
                $status = $request->input('status');
            }
        
            if (!is_null($status)) 
            {
                
                $order->update(['order_status' => $status]);
                
            }
        echo $status;
        }
        
    }
    
    public function process(Request $request)
    {
        $user_id = auth()->id();
        $payment_amount = PaymentTrainingPlanDetail::find( $request->input('payment_plan_detail_id') )->installment_amount;
        
        //0. get requests
        $nonce = $request->input('payment_method_nonce', false);
        
        //1. create order
        $o = $this->createOrder( 'braintree' );
                
        //2. make braintree payments 
        $result =  Braintree_Transaction::sale([
            'amount' => $payment_amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        //3. if payment is successful
        if ( $result->success ) 
        {
            $transaction = $result->transaction;
            
			$payment_type = 1;
			
			$this->confirmOrder( $result, $o, $payment_type );
            
			//dd( $transaction );
    
            return redirect()->route('training_payment.success');
    
        }
        elseif( !is_null($result->transaction) )
        {

            $this->deleteOrder($o);
            
			//dd( $result );

            $message = "Your test transaction has a status of " . $result->transaction->status . ". See the Braintree API response and try again.";
            
            return back()->withErrors([
            
                'message' =>  $message
            
            ]);
        }
        else // go back to payments page 
        {
			$this->deleteOrder($o);

            $errorString = "";
    
            foreach($result->errors->deepAll() as $error) {
                $errorString = 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            
            $errorString = nl2br( $errorString );
            
            //dd( $errorString );
            
            return back()->withErrors([
            
                'message' =>  $errorString
            
            ]);
        }
    }
    
	public function createOrder( $invoice_prefix )
	{
	    $paymentTrainingPlanDetail = PaymentTrainingPlanDetail::find( request()->input('payment_plan_detail_id') );
	    
        $token = hash('sha256', $invoice_prefix . rand());

        $invoice_id = $invoice_prefix . rand();
        
        // create subscription -> subscription
        $subscription = new PaymentTrainingSubscription();
        $subscription->payment_plan_id = $paymentTrainingPlanDetail->payment_training_plan_id;
        $subscription->user_id = auth()->id();
        $subscription->save();
        
        // fulfillment_log ->first subscription
        $fufillment_log = new PaymentTrainingFulfillment();
        $fufillment_log->user_id = auth()->id();
        $fufillment_log->payment_plan_id = $paymentTrainingPlanDetail->payment_training_plan_id;
        $fufillment_log->payment_plan_detail_id = $paymentTrainingPlanDetail->id;
        $fufillment_log->subscription_id = $subscription->id;
        $fufillment_log->invoice_id = $invoice_id;
        $fufillment_log->amount_paid = $paymentTrainingPlanDetail->installment_amount;
        $fufillment_log->status = "unpaid";
        $fufillment_log->token = request()->input('_token');
        $fufillment_log->save();

        $session_fufillment_log = [
            'id'=> $fufillment_log->id,
            'invoice_id'=>$fufillment_log->invoice_id,
        ];
        
        Session::put('session_training_fulfillment', $session_fufillment_log);
        
    	return $fufillment_log;
	}
    
	public function confirmOrder($result, $o, $payment_type )
	{	
		//order confirmation
		
		//update order to paid
		$o->status = "paid";            
		$o->save();
						
		// save payments 
		$payment = new Payment;			
		$payment->user_payment_method_id = $payment_type;
		$payment->invoice_id = $o->invoice_id;
		$payment->payment_gateway_response = json_encode( $result );
		$payment->save();
	}
	
	public function deleteOrder(PaymentTrainingFulfillment $order)
	{
		$subscription = $order->subscription();
        $order->delete();
		$subscription->delete();
	}
}