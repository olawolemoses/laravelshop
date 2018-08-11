<?php

namespace App\Models;

use App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'stock',
        'product_image',
        'product_details',
        'additional_information',
        'cat_id',
        'item_id'
    ];

	public function item()
	{
		return $this->belongsTo('App\Models\Item', 'item_id');
	}

    public function image()
    {
        return $this->product_image;
    }
    
    public function name()
    {
        return $this->product_name;
    }
    
    public function amount()
    {
        return $this->product_price;
    }    
    
    public function date()
    {
        return $this->created_at;
    }
    
	public function reviews()
	{
		return $this->hasMany('App\Models\ProductReview');
	}
	
	public function category(){

    return $this->hasOne('App\Models\Category');
    }
    
}
