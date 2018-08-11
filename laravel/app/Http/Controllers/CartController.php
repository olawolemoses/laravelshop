<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Mail\Welcome; 
use Illuminate\Support\Facades\Hash;
use App\Mail\VerifyCustomer;
use App\Cart;
use App\Models\Product;

class CartController extends Controller
{

    protected $cart;
    
    public function __construct()
    {
        //$this->middleware('guest');
        
        $this->cart = \App\Helpers::get_cart();
    }

    public function index( Request $request )
    {
        //dd( $this->cart->getItems() );
        return $this->showCart();
    }
    
    public function clear()
    {
        $this->cart->clear();
        $this->cart->destroy();
		
		dd( $this->cart->getItems() );
		dd( $this->cart->getTotalQuantity() );
        dd( $this->cart->getId() );

        return view('cart.index');
    }

    public function addProduct( Product $product )
    {
        $quantity = request('qty') ?? 1;
        
        $this->addItemToCart( $product, $quantity );
    }

    public function addProductAndShowCart( Product $product )
    {
        $this->addProduct( $product );
        
        return redirect()->route('cart.index');
    }

    public function addProductAndReturn( Product $product )
    {
        $this->addProduct( $product );
        
        return back();
    }
    
    public function removeProductAndShowCart( $itemID )
    {
        $this->cart->remove( $itemID );
        
        return back();
    }

    
    public function showCart()
    {
        $subTotal = $this->cart->getAttributeTotal('price');
        $shipping = 20;
        $total = $subTotal + $shipping;
        return view('cart.index', [ 
                                    'items'=>$this->cart->getItems(), 
                                    'sub_total'=>$subTotal, 
                                    'shipping'=>$shipping,
                                    'total'=> $total ]);
    }
    
    protected function addItemToCart($item, $quantity )
    {
        //$className = class_basename($item);
    
        $this->cart->add( $item->item->id, $quantity, [
        	'price' => $item->product_price,
        	'image' => $item->product_image,
        	'name' => $item->product_name,
        	'class' => get_class($item)
        ]);
    }
}