<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductReview;
use DB;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->only(['createReview']);
    }
    
    public function index()
    {
        $products = Product::all();
        
        $context = [
            'products' => $products    
        ];

		//dd( $products[0]->isWished );
        return view('product.product', $context);
        
    }
	
	public function detail( $id )
    {
        
        $product = Product::find($id);
        
        $reviews = $product->reviews()->latest()->paginate();
        
        //dd( $reviews );
        
        $reviewsCount = $product->reviews()->count();
				
		$related_products = DB::select("SELECT
					IF(rp.item_a != :id1,v.name,vn.name) AS name,
					IF(rp.item_a != :id2, c.id, cn.id) AS id,
					IF(rp.item_a != :id3, v.image, vn.image) AS image,
					IF(rp.item_a != :id4, v.price, vn.price) AS price,
					IF(rp.item_a != :id5, v.type, vn.type) AS type,
					rp.item_a, 
					rp.item_b,
					c.ID AS cid, 
					cn.ID AS cnid
				FROM items c, items cn, items_names v, items_names vn, product_relevant_products rp		
				WHERE 
				(
					rp.item_a = :id6
					OR 
					rp.item_b = :id7
				)
				
				AND
				
				c.id = rp.item_a AND cn.id = rp.item_b
				
				AND
				
				v.id = rp.item_a AND vn.id = rp.item_b
				
				ORDER BY RAND() LIMIT 5", ["id1"=>$id, "id2"=>$id, "id3"=>$id, "id4"=>$id, "id5"=>$id, "id6"=>$id,"id7"=>$id]);
		
		//dd( $results );
		
        $context = [
            'product' => $product,
			'id'=>$id,
			'reviews'=>$reviews,
			'reviewsCount' => $reviewsCount,
			'related_products' => $related_products
 		];
        
        return view('product.detail', $context );
        
    }
    
    
    public function createReview(Request $request)
    {
        //dd( $request->all() );
        
        $this->validate(request(), [
            'content' => 'required',
            'svx_id' => 'required',
            'rating' => 'required',
        ]);
        
        $review = new ProductReview;
        $review->product_id = $request->svx_id;
		$review->user_id = auth()->id();
		$review->title = "Thank you for your support";
		$review->content = $request->content;
        $review->rating_score = $request->rating;
        $review->save();

        return back();
    }

}