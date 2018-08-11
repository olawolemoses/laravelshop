<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
class ServiceController extends Controller
{
    //
    public function __construct(){

    	return $this->middleware('auth');
    }

    public function index(){

    	$services = Service::paginate(2);
    	return view('admin.services.index',compact('services'));
    }

    public function create(){

    	return view('admin.services.create');
    }

    public function store(Request $request){
        //return dd($request->all());
    	$request->validate([
          
          'service_name' => 'required',
          'service_description' => 'required',
          'service_price' => 'required',
          'service_image' => 'required|mimes:jpeg,jpg,png',
    	]);

    	$service_image = $request->file('service_image');
    	$service_image_name =rand() . '.' . $service_image->getClientOriginalExtension();
    	$service_image->move(public_path('upload'),$service_image_name);

    	$service = Service::create([
         'service_name' => request('service_name'),
         'service_description' => request('service_description'),
         'service_price' => request('service_price'),
         'service_image' => $service_image_name,
    	]);
         if($service ){
             return back()->with(['success','service created successfully']);
         }else{
             return back()->with(['error','error creating service']);
         }
       // return dd($request->all());

    }

    public function show($id){

     $service = Service::find($id);
     return view('admin.services.show',compact('service'));
    }

    public function update(Request $request){

    	$request->validate([
         'service_id' => 'required',
         'service_name' => 'required',
         'service_description' => 'required',
         'service_price' => 'required',
         //'service_image' => 'required',
        ]);

    	$service_image = request('service_image');
    	//return dd(request('service_image'));
    	$service_image_name = rand() . '' . $service_image->getClientOriginalExtension();
    	$service_image->move(public_path('upload'),$service_image_name);

        if($service = Service::where('id','=',request('service_id'))->update([
           'service_name' => request('service_name'),
           'service_description' => request('service_description'),
           'service_price' => request('service_price')
        ])){

        	return back()->with('success','service sucessfully updated');
        }else{

        	return back()->with('error','service successfully updated');
        }
     
     // return dd($request->all());

    }
    
    public function results(Request $request)
    {
      $services = Service::where('service_name','LIKE',"%{$request->input('service_name')}%")->paginate(1);
      
      //return dd($services);
      	return view('admin.services.index',compact('services'));
    }
    
    public function paginate(Request $request)
    {
        $services = Service::paginate(request('numberofresults'));
        return view('admin.services.index',compact('services'));
    }

    public function destroy(Request $request){

       Service::where('id','=',request('service_id'))->delete();
       return back()->with('success','Service successfully deleted');
    }
}
