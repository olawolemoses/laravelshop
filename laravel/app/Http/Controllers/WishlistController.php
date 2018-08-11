<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use DB;

class WishlistController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth')->only(['store']);
    }
	
	public function viewlist(Request $request)
	{
		$s = collect(session()->getDrivers())->first()->getId();
		
		$ip = $_SERVER['REMOTE_ADDR'];
				
		$uid = auth()->id();

		$when = strtotime("-1 week");
		$when = date("Y-m-d h:i:s", $when);
			
		if( Auth::check() )
		{
			//$results = DB::select('select * from users where id = :id', ['id' => 1]);
			$products = DB::table('products')
						->join('wish_list_products', 'products.id', '=', 'wish_list_products.product_id')
						->where('wish_list_products.user_id', $uid)
						->orWhere(function ($query)  use ($s, $ip, $when) {
							$query->where('wish_list_products.sessionID', $s)
								  ->where('wish_list_products.IPAddress', $ip)
								  ->where('wish_list_products.created_at', '>', $when);
						})
						->where('wish_list_products.created_at', '>', $when)
						->get();
		}
		else
		{
			$products = DB::table('products')
						->join('wish_list_products', 'products.id', '=', 'wish_list_products.product_id')
						 ->where(function ($query)  use ($s, $ip, $when) {
							$query->where('wish_list_products.sessionID', $s)
								  ->where('wish_list_products.IPAddress', $ip)
								  ->where('wish_list_products.created_at', '>', $when);
						})
						->get();
		}
		
		return view( 'wishlist.index', [ 'products' => $products ] );
		
	}
    
    public function store(Request $request, Product $product)
    {   
		$sessionID = collect(session()->getDrivers())->first()->getId();
		
		$wish = new Wishlist;
		$wish->product_id = $product->id;

		if (Auth::check()) {				
			$wish->user_id = auth()->id();
			$wish->quantity = 1;
			$wish->priority = 0;
		}
		else {
			$wish->user_id = 0;
			$wish->quantity = 1;
			$wish->priority = 0;
		}
		
		$wish->sessionID = $sessionID;
		$wish->IPAddress = $_SERVER['REMOTE_ADDR'];
		$wish->save();			
	
        return back();
    }
}
