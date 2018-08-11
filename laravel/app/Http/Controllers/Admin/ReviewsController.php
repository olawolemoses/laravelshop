<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use App\Models\ServiceReview;
use App\Models\TrainingReview;

class ReviewsController extends Controller
{
    //
    public function __construct()
    {
     
     return $this->middleware('auth');
    }

    public function index()
    {
        $reviews = ProductReview::paginate(3);
    	return view('admin.reviews.index',compact('reviews'));
    }

    public function destroy(Request $request)
    {
       // return dd($request->all());
       $review = ProductReview::find($request('review_id'))->delete();
        
        if($review)
        {
       return back()->with('success','Review deleted successfully');
        }else{

        	return back()->withErrors(['error','Review deleted']);
        }
    }

    public function service(){

        $serviceReviews = ServiceReview::paginate(15);
    	return view('admin.reviews.service.index',compact('serviceReviews'));
    }

    public function destroyService(Request $request)
    {

    	//return dd($request->all());
       $review = ServiceReview::find($request->servicereview_id)->delete();
        
        if($review)
        {
       return back()->with('success','Review deleted successfully');
        }else{

        	return back()->withErrors();
        }
    }

    public function training()
    {
        
        $trainingReview = TrainingReview::paginate(15);
    	return view('admin.reviews.training.index',compact('trainingReview'));
    }

    public function destroyTraining(Request $request)
    {
    	// return dd($request->all());
       $review = TrainingReview::find($request->trainingreview_id)->delete();
        
        if($review)
        {
       return back()->with('success','Review deleted successfully');
        }else{

        	return back()->withErrors();
        }
    }
}
