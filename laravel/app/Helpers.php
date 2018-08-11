<?php
namespace App;

class Helpers
{
    public static function trim_characters($text, $min=20)
    {
        $words = str_word_count($text, 1);
        $len = min($min, count($words));
        $first_num = array_slice($words, 0, $len);
        array_push($first_num, "...");
        return implode(' ', $first_num);
    }
    
    public static function get_cart()
    {
        $options = [
            	// Maximum item can added to cart, 0 = Unlimited
            	'cartMaxItem' => 0,
            	// Maximum quantity of a item can be added to cart, 0 = Unlimited
            	'itemMaxQuantity' => 100,
            	// Do not use cookie, cart items will gone after browser closed
            	'useCookie' => false,
        ];
        
        $cart = new Cart( $options );        
        
        return $cart;
    }
    
    public static function convert_json_to_html_list($json)
    {
        $items = json_decode( $json, true);
        $str = "<ul style='font-size: 14px;'>";
        if(!empty( $items ))
            foreach( $items as $item ) 
                $str .= "<li class='list_item'>" . $item . "</li>";
        $str .="</ul>";
        
        return $str;
    }
}