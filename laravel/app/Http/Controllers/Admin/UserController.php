<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Role_User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;


class UserController extends Controller
{
    //
//protected $redirectTo = '/';
    public function __construct()
    {

    	return $this->middleware('auth');
    }

    public function index(){
        
       $users =  User::paginate(15);
       
       return view('admin.users.index',compact('users'));

    }

    public function store(Request $request){

    	return dd($request->all());

    	$request->validate([
          
          'username' => ' bail|email|required',
          'password' => 'bail|min:6|required',

    	]);

    	$password = Hash::make(request('password'));

    	if(Auth::attempt(['username' => request('username'),'password' => $password])){

    		return redirect()->route('dashboard');

    	}else{

    		return back()->withErrors('We don\'t know you dog!!!!!');
    	}

    //	return dd($request->all());
    }

    public function update(Request $request, User $user){

    // return dd($request->all());
      $request->validate([
         'user_id' => 'required',
         'firstname' => 'bail|required',
         'lastname' => 'bail|required',
         'email_address' => 'bail|required',
         'password' => 'nullable|confirmed|min:6'

      ]);
     
      $password = $request->input('password');
      if($user = User::where('id','=',$request->input('user_id'))->update([

      'firstname' => $request->input('firstname'),
      'lastname' => $request->input('lastname'),
      'username' => $request->input('email_address'),
      'password' => Hash::make($password)

     ])){

    	return back()->withInput();
    }

    }
  public function show(){

    $roles = Role::orderBy('name')->pluck('name','id');
    return view('admin.user.create',compact('roles'));
  }

  protected function validator(array $data){

   return Validator::make($data,[
      'firstname' => 'required|max:255',
      'lastname' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|min:6|confirmed',
      'role' => 'required|exists:roles,id',

   ]);

  }

  public function create(Request $request){

    //return dd($request->all());

    $request->validate([
      'firstname' => 'required',
      'lastname' => 'required',
      'email_address' => 'required',
      'username' => 'required',
      'password' => 'required|confirmed',
       'role' => 'required',

    ]);

    //return dd($request->all());
    
    $user =  User::create([
     'user_type' => 0,
     'subscription_id' =>0,
     'firstname' => request('firstname'),
     'lastname' => request('lastname'),
     'email_address' => request('email_address'),
     'username' => request('email_address'),
     'password' =>Hash::make(request('password')),
     'status' => 1,
     'last_login' => NOW(),
    ]);

    //return dd($user->id);

    if($user){
     
     Role_User::create([
     
     'user_id' => $user->id,
     'role_id' => request('role')
   
     ]);
    
     return back()->with('User successfully Created');
    }else{

    return back()->with('Error creating user');
    }
    
    

  }

   public function destroy(Request $request){

    	Auth::logout();
    	return redirect()->route('login');
    }
}
