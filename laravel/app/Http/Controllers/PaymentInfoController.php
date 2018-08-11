<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Training;
use App\Models\Membership;
use App\Models\PaymentTrainingPlan;
use App\Models\TrainingPackage;

use App\Models\BookingsUserPending;
use Session;

class PaymentInfoController extends Controller
{
    protected $cart;
    
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->cart = \App\Helpers::get_cart();
    }    
    
    public function index(Request $request)
    {
        //dd( $this->cart );
        
        $subTotal = $this->cart->getAttributeTotal('price');
        $shipping = 20;
        
        $total = $subTotal + $shipping; 
   
        return view('paymentInfo.index', compact( 'cart', 'shipping', 'total', 'subTotal' ));
    }
    
    public function trainings(Request $request)
    {
        //dd( $request->all() );
        $package_id = $request->input('training_plan_id');
    
        $training = Training::find( $request->input('training') );
        
        //dd( $training );
        
        $training_package = TrainingPackage::find($package_id);
        
        $training_plans = $training_package->training_plans()->where('count','>', 1)->get();
        
        //dd( $training_plans->count() );
        
        //dd( $training_plans[0]->training_plan_details );
        $total = $training_package->price;
        
        $total_training_plan = $training_package->training_plans()->where('count', 1);
        //dd( $total_training_plan->first()->training_plan_details->first());

        
        return view( 'paymentInfo.training', ['total' => $total, 'total_training_plan' => $total_training_plan, 'training_plans' => $training_plans ]);
    }
    
    public function membership(Request $request, Membership $membership)
    {
        $total = $membership->price;
        
        return view( 'paymentInfo.membership', ['total' => $total, 'membership' => $membership ]);
    }   

    public function bookings(Request $request )
    {
        //$total = getPrice of bookings;
        $bookings = Session::get('session_slot_hour_log');
		
		$total_price = 0;
		
		$services = [];
		
		foreach( $bookings as $booking )
		{
			$service = BookingsUserPending::find( $booking )->bookingsSlotHour->slot->service;
			$total_price += $service->service_price;
			$services[] = $service;
		}
		
		$ids = json_encode( collect( $services )->pluck( 'id' ) );
		
        return view( 'paymentInfo.bookings', ['total' => $total_price, 'services' => $services, 'ids'=>$ids ]);   
    }   	
}