<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wish_list_products';
    
    protected  $casts = [

    ];

	protected $dates = [
		
	];

	protected $fillable = [
		'product_id',
		'user_id',
		'quantity',
		'priority',
		'sessionID',
		'IPAddress'
	];
   
   	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
}
