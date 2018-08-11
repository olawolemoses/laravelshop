<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Category;
use App\Models\User;

class ProductOrderController extends Controller
{
    //
        public function __construct()
    {
    	$this->middleware('auth');
    }
    
    public function index()
    {
     $productorders = Order::paginate(1);
   //  $payment_method = Order
     return view('admin.productorders.index',compact('productorders'));
    }

    public function edit($id){
     $categories = Category::all();
     $order = Order::find($id);
    // return dd($order);
     return view('admin.productorders.edit',compact('categories','order'));
    }
    
    public function result(Request $request){
    //return dd($request->all());
    //$order = Order::where('order_name','LIKE',"%{$request->input('order_name')}%")->paginate(2);
    $order = User::where('username','LIKE',"%{$request->input('email')}%")->paginate(2);
   	return view('admin.products.index',compact('order'));
    }

    public function destroy(Request $request)
    {
    	$order = ProductOrder::where('id','=',request('order_id'))->first();

    	if($order->status == 0){

         return back()->with('warning','Order already Cancelled');
    	}else{
        $order->update([
       'status' =>0
      ]);

      return back()->with('success','Order Cancelled');
  }
    // return dd($request->all());
    }
}
