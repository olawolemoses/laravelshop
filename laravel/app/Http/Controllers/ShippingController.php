<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\DeliveryAddress;
use DB;
use Session;

class ShippingController extends Controller
{
    protected $cart;
    
    public function __construct()
    {
        $this->middleware('auth');   
        
        $this->cart = \App\Helpers::get_cart();
        
    }
    
    public function addShippingAddress()
    {
        $user = auth()->user();
        
        $profile = $user->profile;
        
        $subTotal = $this->cart->getAttributeTotal('price');
        $shipping = 20;
        $total = $subTotal + $shipping;
        
        return view('shipping.add_address', compact('user','profile', 'subTotal', 'shipping', 'total') );
    }
    
    public function store(Request $request)
    {
        //dd( $request->all() );
        
        $user = auth()->user();
        
        $this->validate( request(), [
            'firstname' => 'required',
            'state' => 'required',
            'lastname' => 'required',
            'street' => 'required|string',
            'country' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'mobile_no' => 'required',
        ]);
        
        DB::beginTransaction();
        
        $delivery_address = $user->delivery_address;

		if(is_null( $delivery_address ) )
			$delivery_address = new DeliveryAddress;
		
        try 
		{
            // Validate, then create if valid
            $delivery_address->firstname = request('firstname');
            $delivery_address->user_id = $user->id;
            $delivery_address->lastname = request('lastname');
            $delivery_address->street = request('street');
            $delivery_address->country = request('country');
            $delivery_address->state = request('state');
            $delivery_address->city = request('city');
            $delivery_address->postal_code = request('postal_code');
            $delivery_address->mobile_no = request('mobile_no');
            $delivery_address->save();
			
			$address = [
				'id'=> $delivery_address->id,
				'user_id'=>auth()->id(),
			];
			
			Session::put('delivery_address', $address);
			
			//@if(Session::has('new_notification')
				
				//{{ Session::get('delivery_address.id') }}
				
			//@endif
        
		} catch (ValidationException $e) {
            // Rollback and then redirect back to form with errors
            DB::rollback();
            return back()->withErrors($e->getMessage())->withInput();
        
		} catch (\Exception $e) 
		{
			DB::rollback();
            return back()->withErrors($e->getMessage())->withInput();
		}
        
        DB::commit();
        
        return redirect()->route('payment_info');
    
	}
	
}