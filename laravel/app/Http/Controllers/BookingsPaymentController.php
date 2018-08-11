<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\BookingsInvoice;
use App\Models\BookingsUserPending;
use App\Models\Payment;
use App\Models\BookingsInvoiceDetails;
use App\Models\BookingsUser;

use Braintree_Transaction;
use CoinGate\CoinGate;

use Session;
use DB;

class BookingsPaymentController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('guest', ['except'=>['process', 'coingateProcess', 'coingateSuccess', 'orderSuccess'] ]);
    } 
    
    public function orderSuccess()
    {
        $booking_invoice = BookingsInvoice::find( Session::get('session_booking_invoice.id') );   
		dd( $invoice );
        
        //$subscription = $payment_detail->subscription;
        //$user = User::find( $booking_invoice->user_id );
        //$invoice = $payment_detail->invoice_id;
		
        //$training = $subscription->training_plan->training_package->training;
        //$training_plan = $subscription->training_plan;
        //$total = $training_plan->training_package->price;
        //$amount_paid = $payment_detail->amount_paid;
        
        
        return view('payments.booking_success', compact('subscription', 'user', 'invoice', 'training', 'training_plan', 'total', 'amount_paid') );
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
        return redirect()->route('booking_payment.success');
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
		//dd( $request->all() );

        $user_id = auth()->id();
        $payment_amount = $request->input('total');
        
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
    
            return redirect()->route('booking_payment.success');
    
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
		$slot_hour_ids = Session::get( 'session_slot_hour_log' );
		
		//dd( $slot_hour_ids );

		$token = hash('sha256', $invoice_prefix . rand());

		$invoice_id = $invoice_prefix . rand();
		
		
		$bookingInvoice = new BookingsInvoice;
		$bookingInvoice->invoice_id = $invoice_id;
		$bookingInvoice->user_id = auth()->id();
		$bookingInvoice->status = "unpaid";
		$bookingInvoice->total_amount = request()->input('total');
		$bookingInvoice->token = request()->input('_token');
		$bookingInvoice->save();
		
		foreach( $slot_hour_ids as $slot_hour_id )
		{			
			$service = BookingsUserPending::find( $slot_hour_id )->bookingsSlotHour->slot->service;
			
			// fulfillment_log ->first subscription
			$bookingInvoiceDetails = new BookingsInvoiceDetails();
			$bookingInvoiceDetails->user_id = $bookingInvoice->user_id;
			$bookingInvoiceDetails->invoice_id = $invoice_id;
			$bookingInvoiceDetails->service_id = $service->id;
			$bookingInvoiceDetails->slot_hour_id = $slot_hour_id;
			$bookingInvoiceDetails->amount_paid = $service->service_price;
			$bookingInvoiceDetails->save();
		}

		$session_booking_invoice = [
			'id'=> $bookingInvoice->id,
			'invoice_id'=>$bookingInvoice->invoice_id,
		];
		
		Session::put('session_booking_invoice', $session_booking_invoice);
		
		return $bookingInvoice;
	}
    
	public function confirmOrder($result, $o, $payment_type )
	{	
		//order confirmation
		
		//update order to paid
		$o->status = "paid";            
		$o->save();
		
		// create subscription -> subscription
				//convert booking user pending to booking user live
		$invoice_id = $o->invoice_id;
		$invoice_details = BookingsInvoiceDetails::where('invoice_id', $invoice_id );
		
		foreach( $invoice_details as $invoice_detail )
		{
			$bookingUser = new BookingsUser;
			$bookingUser->user_id = $invoice_detail_>user_id;
			$bookingUser->bookings_slot_hour_id = $invoice_detail_>bookings_slot_hour_id;
			$bookingUser->date = BookingsUserPending::find( $invoice_detail_>bookings_slot_hour_id )->date;
			$bookingUser->save();
		}
		
		// save payments 
		$payment = new Payment;			
		$payment->user_payment_method_id = $payment_type;
		$payment->invoice_id = $o->invoice_id;
		$payment->payment_gateway_response = json_encode( $result );
		$payment->save();
	}
	
	public function deleteOrder(PaymentTrainingFulfillment $order)
	{
		$invoiceDetails = $order->details();
        $invoiceDetails->delete();
		$order->delete();
	}
}