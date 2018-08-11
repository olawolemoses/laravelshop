<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Training;
use Carbon\Carbon;

class TrainingController extends Controller
{
    //

    public function __construct(){

    	return $this->middleware('auth');
    }

    public function index()
    {
    	$trainings =  Training::paginate(2);
    	return view('admin.trainings.index',compact('trainings'));
    }

    public function create()
    {
    	return view('admin.trainings.create');
    }

    public function store(Request $request){

    return dd($request->all());

     $request->validate([
       'training_name' => 'required',
       'training_description' => 'required',
       'training_startdate' => 'required',
       'training_enddate' => 'required',
      'training_image' => 'required',
     ]);

     $image = $request->file('training_image');
     $image_name  = rand(). '.' .$image->getClientOriginalExtension();
     $image->move(public_path('img'), $image_name);

     $training = Training::create([
       'training_title' => request('training_name'),
       'training_description' => request('training_description'),
       'training_startdate' => request('training_startdate'),
       'training_enddate' => request('training_enddate'),
       //'training_image' => $image_name,
     ]);


     if($training){
     	return back()->with('success','Training created');
     }else{

     	return back()->withError('error','Error creating training');
     }     
    // return dd($request->all());
    }

    public function edit($id){
     
     $training = Training::find($id);
     return view('admin.training.edit',compact('training'));
    }

    public function update(Request $request)
    {
       
       $request->validate([
       'training_name' => 'required',
       'training_description' => 'required',
       'training_startdate' => 'required',
       'training_enddate' => 'required',
      'training_image' => 'required',
     ]);

     $image = $request->file('training_image');
     $image_name  = rand(). '.' .$image->getClientOriginalExtension();
     $image->move(public_path('img'), $image_name);  

       $training =  Training::where('id','=',request('training_id'))->update([      
        'training_title' => request('training_name'),
        'training_description' => request('training_description'),
        'training_startdate' => request('training_startdate'),
        'training_enddate' => request('training_enddate'),
        'training_image' => $image_name,
       ]);

       if($training){

       	return back()->with('success','Training updated successfully');
       }else{

       	return back()->withError();
       }
      //return dd($request->all());
    }

    public function destroy(Request $request)
    {
      
     $training = Training::where('id','=',request('training_id'))->delete();
     
     if($training)
     {
     return back()->with('success','Training deleted'); 
     }else
     {
     	return back()->withError();
     }
     //return dd($request->all());
    }
}
