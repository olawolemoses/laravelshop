<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Invoice;
use App\Models\Shipping;
use App\Models\Payment;
use Braintree_Transaction;
use CoinGate\CoinGate;

use Session;
use DB;

class PaymentsController extends Controller
{

    protected $cart;
    
    public function __construct()
    {
        $this->middleware('guest', ['except'=>['process', 'coingateProcess', 'coingateSuccess', 'orderSuccess'] ]);
        
        $this->cart = \App\Helpers::get_cart();
    }  

    
    public function clearCartRedirect()
    {
        $this->cart->clear();
						
	    return redirect()->route('payment.success');
    }
    
    
    public function orderSuccess()
    {
        $order = Order::find( Session::get('session_order.id') );   
        
        $order_id = $order->invoice_id;
        
        $context = [
            'order_id' => $order_id
        ];
        
        return view('payments.order_success', $context );
    }
    
    // checkout
    public function coingateProcess( Request $request )
    {
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
            'price_amount'      => $this->getTotal(),
            'price_currency'    => 'USD',
            'receive_currency'  => 'USD',
            'callback_url'      => route('payment.coingatecallback'),
            'cancel_url'        => route('payment_info'),
            'success_url'       => route('payment.coingatesuccess'),
            'title'             => 'Order ' . $o->id,
            'description'       => 'Orders from Honeydrops',
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
		return $this->clearCartRedirect();
    }


    public function coingateCallback( Request $request) 
    {
        $order = Order::find($request->input('order_id'));

        if ($request->input('token') == $order->token) 
        {
            $status = NULL;
            
            if ($request->input('status') == 'paid') 
            {
                if ($request->input('price_amount') >= $order->total_price) {
     
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
        //0. get requests
        $nonce = $request->input('payment_method_nonce', false);
        
        //1. create order
        $o = $this->createOrder( 'braintree' );
        
        //2. make braintree payments 
        $result =  Braintree_Transaction::sale([
            'amount' => $this->getTotal(),
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
                        
    		return $this->clearCartRedirect();
        }
        elseif( !is_null($result->transaction) )
        {
			$o_items =$o->items();
            $o_items->delete();
			$o->delete();
			
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
            
            return back()->withErrors([
            
                'message' =>  $errorString
            
            ]);
        }
    }
	
	public function createOrder( $invoice_prefix )
	{
        $token = hash('sha512', $invoice_prefix . rand());
        $invoice_id = $invoice_prefix . rand();
 	
		$o = Order::create([
            'user_id'   => auth()->id(),
            'invoice_id' => $invoice_id,
            'token' => request('_token'),
            'total_price' => $this->getTotal(),
            'order_status' => 'unpaid'
        ]);
        
        $allOrderItems = $this->cart->getItems();

        //1.1 create order_item  
        
        //dd($allOrderItems);
        
        foreach ($allOrderItems as $orderItems) 
        {
          foreach ($orderItems as $orderItem) 
          {            
            OrderItem::create([
                'order_id'   => $o->id,
                'item_id' => $orderItem['id'],              
                'qty' => $orderItem['quantity'],              
                'unit_price' => $orderItem['attributes']['price'],              
            ]);
          }
        }
        
		$session_order = [
			'id'=> $o->id,
			'invoice_id'=>$o->invoice_id,
		];
		
		Session::put('session_order', $session_order);
        
		
		return $o;
	}
	
	public function confirmOrder($result, $o, $payment_type )
	{	
		//order confirmation
		
		//update order to paid
		$o->order_status = "paid";            
		$o->save();

		// save shipping
		$shipping = new Shipping;
		$shipping->address_id = $o->user->deliveryAddress->id;
		$shipping->order_id = $o->id;
		$shipping->save();
			
		// invoice 
		$invoice = new Invoice;
		$invoice->invoice_id = $o->invoice_id;
		$invoice->shipping_id = $shipping->id;
		$invoice->user_id = $o->user->id;
		$invoice->order_id = $o->id;
		$invoice->invoice_amt_total = $o->total_price;
		$invoice->save();

		// invoice items
								
		// save payments 
		$payment = new Payment;			
		$payment->user_payment_method_id = $payment_type;
		$payment->invoice_id = $invoice->invoice_id;
		$payment->payment_gateway_response = json_encode( $result );
		$payment->save();
	}
	
	public function deleteOrder(Order $order)
	{
		$o_items =$order->items();
        $o_items->delete();
		$order->delete();
	}
	
	public function getTotal()
	{
        $subTotal = $this->cart->getAttributeTotal('price');
        $shipping = 20;
        $total = $subTotal + $shipping;
        return $total;	    
	}
}