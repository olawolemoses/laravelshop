<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    //
    public function index(){
    	return view('admin.session.login');
    }

    public function store(Request $request){
         // return dd($request->all());
    	$request->validate([
          'username' => ' bail|email|required',
          'password' => 'bail|min:6|required',
    	]);
         $remember_me = request('remember_me') == '1' ? true : false ;
         
    	if(Auth::attempt(['username' => request('username'),'password' => request('password')],$remember_me)){
    	    
    		return redirect()->route('admin-dashboard');

    	}else{

    		return back()->withErrors('User does not exist');
    	}

    }

    public function destroy(){
    	auth()->logout();
    	return redirect()->route('admin');
    }
}
