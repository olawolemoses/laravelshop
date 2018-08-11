<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderCancelation;

use Braintree_Transaction;
    
class OrdersController extends Controller
{
    
    // checkout
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $orders = Order::where("user_id", $user_id)->get();
        dd( $orders );
    }
    
    public function requestCancel( Order $order )
    {
        return view( 'profile.cancel_order', ['order' => $order] );
    }

    public function confirmCancel( Order $order )
    {
        $this->validate( request(), [
            'reason' => 'required',
        ]);
        
        $result = $this->cancelOrder( $order, "user" );
        
        if( $result )
            request()->session()->flash('status', 'The order was successfully canceled and we have sent a mail to you.');
        else
            request()->session()->flash('status', 'The order cancelation failed.');
        
        
        return redirect()->route('profile.index', ['tab'=>'orders']);
    }
    
    
    public function cancelOrder( $order, $initiatedBy )
    {
        // Only orders that are awaiting payment or awaiting dispatch can
        // be cancelled, so we must check the status of the order first.
        // is the order pending payment or dispatch i.e. cancellable?

        if( $order->invoice->status == 1 || $order->invoice->status == 2 )
        {
            // We then update the order item in the database to cancelled.
            //$changes = array( 'status' => 4 );
            //$this->registry->getObject('db')->updateRecords('orders', $changes, 'ID=' . $this->id );
            
            $status = Invoice::STATUS_CANCELED;
            $order->invoice->update(['status' => $status]);
            
            // If the order was cancelled by the customer, we then need to
            // e-mail the administrator, e-mail confirmation to the customer,
            // and if we can, refund the payment.
            if( $initiatedBy == 'user' )
            {
                // e-mail the administrator
                // e-mail the customer confirmation
                // refund the payment?
            }
            // If the order was refunded by the administrator we e-mail the
            // customer to inform then, and if possible, refund the payment.
            elseif( $initiatedBy == 'admin' )
            {
                // e-mail the customer
                // refund the payment?
            }
            
            $this->logCancelation( $order, $initiatedBy );
            
            // We return true, so that the relevant controller can display a
            // message indicating that the order was cancelled.
            return true;
        }
        else
        {
           // order isnt cancallable
           return false;
        }
    }
    
    public function logCancelation( $order, $initiatedBy )
    {
        
        if(! is_null( $order->cancelation ) )
        {
            $cancelation = $order->cancelation;
        }
        else {
            $cancelation = new OrderCancelation;
        }
        
        $cancelation->order_id = $order->id;
        
        $cancelation->initiated_by = $initiatedBy;
        
        $cancelation->reason = request('reason');
        
        $cancelation->save();
        
    }
    
    
}