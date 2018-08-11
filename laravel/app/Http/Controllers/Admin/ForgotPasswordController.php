<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminForgotPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\UUID;
use \DB;

class ForgotPasswordController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('guest');
    }
    
    public function index()
    {
        return view('admin.passwords.email');
    }
    
    public function sendResetPassword(Request $request)
    {
       // return dd($request->all());
        $request->validate([
           'username' => 'required' 
        ]);
        
        $user =  User::where('username','=',request('username'))->first();
        if(count($user) > 0)
        {
          $token = new UUID;
          $code = str_random(40);
          DB::table('password_resets')
          ->where('email','=',request('username'))->delete();
          DB::table('password_resets')->insert([
            'email' => request('username'),
            'token' => $token,
            'created_at'=> date('Y-m-d H:i:s')
            ]);
            
            \Mail::to($user->username,$user->name())
            ->send(new AdminForgotPassword($user,$code));
            return back()->with('status','Reset email sent successfully');
        }
    }
    
    
    public function newpassword(Request $request)
    {
       // return dd($request->all());
        
        $email = $request->query('email') ?? "";
        $code = $request->query('code') ?? "";
     return view('admin.passwords.reset',compact('email','code')) ;
    }
    
    public function resetpassword(Request $request)
    {
        //return dd($request->all());
        $request->validate([
           'token' => 'required',
           'username' => 'required|string|email|max:255|exists:users,username',
           'password' => 'required|confirmed',
        ]);
        
        $code = $request->input('token');
        $user = User::where('username','=',$request->input('username'))->first();
        $user->password = Hash::make($request->input('password'));
        
        DB::table('password_resets')
        ->where('email',$request->input('username'))
        ->delete();
        
        $user->save();
        
        return redirect('admin')->with('status','Password Updated! Please login');
        
    }
}
