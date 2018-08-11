<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;


class CategoryController extends Controller
{
    //

    public function __construct(){

    	return $this->middleware('auth');
    }

  public function index(){

     $categories = Category::paginate(3);
    	return view('admin.category.index',compact('categories'));
    }
    
  public function create()
  {
    return view('admin.category.create');
   }    


    public function show($id = null){
 
    	if($id !== null){
             
            $category = Category::find($id); 
    		return view('admin.editcategory',compact('category'));
    	}

    	return view('admin.addcategory');
    }
    public function update(Request $request){
        
        $request->validate([
         'category_id' => 'required',
         'category_name' => 'required',
         'category_description' => 'required',
    	]);


        Category::where('id','=',$request->input('category_id'))
         	->update([
             'category_name' => $request->input('category_name'),
             'category_description' => $request->input('category_description')
         	]);

         	return back()->with('message','Category Updated Successfully');

    }


    public function store(Request $request){

		$request->validate([
         'category_name' => 'required',
         'category_description' => 'required',
    	]);

    	$category = Category::create([
             'category_name' => $request->input('category_name'),
             'category_description' => $request->input('category_description'),
         	]);

    	 return back()->with('Category Created Successfully');
    }

    public function destroy(Request $request){
 
     Category::find(request('category_id'))->delete();

     return back()->with('Category Successfully deleted');

    }

    

}
