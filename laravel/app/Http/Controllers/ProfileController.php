<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

use Validator;

use DB;

class ProfileController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $is_active = request()->query('tab', "profile");
        
        $user = auth()->user();
        
        $profile = $user->profile;
        
        $orders = $user->orders;
        
        $subscriptions = $user->training_subscriptions->all();
        
        //dd( $subscriptions );
        
        //dd( $orders[0]->items[0]->item );
        
        return view( 'profile.index', [ 'profile'=>$profile, 'user'=>$user, 'orders'=> $orders, 'subscriptions'=>$subscriptions, 'is_active'=>$is_active ] );
    }
    
    public function update(User $user, Request $request)
    {
        //dd($request->all());
        // validate the form
        //dd($user->customer);
        
        $user = auth()->user();
        
        $v = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'mobile_no' => 'required',
            'old_password' => 'required'
        ]);
        
        $v->sometimes('new_password', 'required|confirmed', function ($input) {
            return (request('old_password') != '***********************************');
        });

        if ($v->fails()) {
            return back()
                        ->withErrors($v)
                        ->withInput();
        }

        $user_type = 1;
        DB::beginTransaction();
        
        $profile = $user->profile;
                
        try {
            // Validate, then create if valid
            $user->firstname = request('firstname');
            $user->lastname = request('lastname');
            $profile->street = request('street');
            $profile->city = request('city');
            $profile->state = request('state');
            $profile->country = request('country');
            $profile->mobile_no = request('mobile_no');

            if (request('old_password') != '***********************************')
            {
                $user->password = Hash::make(request('new_password'));
            }
            
            $profile->save();
            $user->save();
            $request->session()->flash('message', 'Update was successful!');
            
        } catch (ValidationException $e) {
            // Rollback and then redirect
            // back to form with errors
            DB::rollback();
            return Redirect::to('/login')->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        
        // If we reach here, then data is valid and working.
        // Commit the queries!
        DB::commit();
        return redirect()->route('profile.index');
    }

}    