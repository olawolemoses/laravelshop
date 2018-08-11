<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Item;

class ProductController extends Controller
{
    //
    public function __construct(){

    	return $this->middleware('auth');
    }

    public function index(Product $products){
      
      // $this->authorize('view',Product::class);
    	$products = Product::paginate(3);
        //$categories = Category::where('id','=',$product->category_id)->first();
    	return view('admin.products.index',compact('products'));
    }

    public function edit($id = null){
        
        if($id != null){
        $categories = Category::all();
        $product = Product::find($id);
        $product_details = json_decode($product->product_details);
        //return dd($product_details);
        $product_details = implode(",",$product_details);
        return view('admin.products.edit',compact('categories','product','product_details'));
        }
 
    }

public function create()
{
    $categories =  Category::all();
    return view('admin.products.create',compact('categories'));
}
public function store(Request $request){
//return dd($request->all());
     $request->validate([
        'product_name' => 'required',
        'product_description' => 'required',
        'product_price' => 'required',
        'product_details' => 'required',
        'additional_information' => 'required',
        'category_id' => 'required',
        //'item_id' => 'required',
        'stock' => 'required',
        'product_image' => 'required|mimes:png,jpeg,jpg',
    	]);
      $item = Item::create([
        'SKU' => 0,  
         'item_type' => 1,
         'featured' => 0,
         'active' => 1,
         'secure' => 1,
          ]);
        
        $item_id = $item->id;  
       if($item)
       {
        $item =  $item->update([
            "SKU" => "SKU000$item->id",
            ]) ;
            //return dd($item_id);
       }   
    
         $product_name = request('product_name');
         $product_description = request('product_description');
         $product_price = request('product_price');
         $category_id = request('category_id');
         $stock = request('stock');
         $product_details = request('product_details');
         $product_details = explode(',',$product_details);
         $product_details = json_encode($product_details);
         $additional_information = request('additional_information');

         $product_image = $request->file('product_image');
       $product_image_name  = rand() . '.' . $product_image->getClientOriginalExtension();
       $product_image->move(public_path('upload'), $product_image_name);
      // return dd($product_details);
       $product = Product::create([
             'item_id' => $item_id,
             'product_name' =>$product_name,
             'product_description' => $product_description,
             'product_price' => $product_price,
             'cat_id' =>$category_id, 
             'stock' =>$stock, 
             'product_details' => $product_details,
             'additional_information' => $additional_information,
             'product_image' => $product_image_name
          ]);
        
        if($product){
          return back()->with('success','Product created');
        }else
        {
            return back()->with('error','Error creating service');
        }
    	

    }

    public function update(Request $request){

        //return dd($request->all());
        $request->validate([
          'product_id' => 'required',
         'product_name' => 'required',
         'category_id' => 'required',
         'product_description' => 'required',
         'product_price' => 'required',
         'product_details' => 'required',
         'additional_information' => 'required',
         'stock' => 'required',
         'product_image' => 'mimes:jpeg,png,jpg|nullable'
        ]);

        $product_image = $request->file('product_image');
       $product_image_name  = rand() . '.' . $product_image->getClientOriginalExtension();
       $product_image->move(public_path('upload'), $product_image_name);
       $product_details = request('product_details');
         $product_details = explode(',',$product_details);
         $product_details = json_encode($product_details);

        $product = Product::where('id','=',request('product_id'))->update([
         
         'product_name' => request('product_name'),
         'product_description' => request('product_description'),
         'product_price' => request('product_price'),
         'product_details' => $product_details,
         'additional_information' => request('additional_information'),
         'cat_id' => request('category_id'),
         'stock' => request('stock'),
         'product_image' =>  $product_image_name 

        ]);

        return back()->with('success','Product Updated');
    }
    
    public function result(Request $request){
    //return dd($request->all());
    $products = Product::where('product_name','LIKE',"%{$request->input('product_name')}%")->paginate(2);
   	return view('admin.products.index',compact('products'));

    }
    
    public function paginate(Request $request)
    {
        $products = Product::paginate(request('numberofresults'));
        return view('admin.products.index',compact('products'));
    }

    public function destroy(Request $request){

    //return dd($request->all());
     Product::find(request('product_id'))->delete();
     return back()->with('success','Product deleted');
    }
}
