<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class SettingsController extends Controller
{
    //
    
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index( $id)
    {
        $user = User::find($id);
        return view('admin.settings.index',compact('user'));
    }
    
    public function update(Request $request)
    {
       
     
     if(!empty(request('fullname')))
     {
         $names = explode(" ",request('fullname'));
     }
     
     $request->validate([
        'user_id' => 'required',
        'fullname' =>'required',
        //'lastname' => 'required',
        'email' => 'required',
        'password' => 'confirmed|min:6|nullable' ,
         ]);
    
   // return dd(request('password'));
    if(request('password') != null)
    {
      $password = Hash::make(request('password'));  
      
       $user = User::where('id','=',request('user_id'))->update([
         'firstname' => $names[0],
         'lastname' => $names[1],
         'username' => request('email'),
         'password' => $password
         ]);
    }else {
        $user = User::where('id','=',request('user_id'))->update([
         'firstname' => $names[0],
         'lastname' => $names[1],
         'username' => request('email'),
         ]);  
    }
    
    return back()->with('success','success updating the user profile');     
    }
}
