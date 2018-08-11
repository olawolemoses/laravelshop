<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;

class CheckoutController extends Controller
{
    protected $cart;
    
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->cart = \App\Helpers::get_cart();
    }    
    
    public function index(Request $request, Product $product)
    {
        $quantity = $request->query('qty') ?? 1;
        
        //dd( $this->cart );
        $subTotal = $this->cart->getAttributeTotal('price');
        $shipping = 20;
        $total = $subTotal + $shipping;        
        
        return view('checkout.index', compact( 'cart', 'shipping', 'total', 'subTotal' ));
    }
}