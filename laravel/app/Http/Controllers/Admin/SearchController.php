<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;

class SearchController extends Controller
{
    //

    public function __construct(){

    	return $this->middleware('auth');
    }

    public function index(Request $request){

       $services = Service::where('service_name','LIKE',"%{$request->input('service_name')}%")->get();

       return view('admin.services.search',compact('services'));
    }

    public function result(Request $request){

    	//return dd($request->all());
    
   return $products = Product::where('product_name','LIKE',"%{$request->input('category_name')}%")->get();

   // return response()->json($products);
   // return dd($request->input('category_search'));
 
    }
}
