<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shipping';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
        'address_id',
        'order_id'
    ];
    
	public function deliveryAddress()
	{
		return $this->belongsTo('App\Models\DeliveryAddress', 'address_id');
	}
    
}