<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [
        'user_id',
        'invoice_id',
        'token',
        'total_price',
        'order_status'
    ];
    
    public function cancelation()
    {
        return $this->hasOne('App\Models\OrderCancelation', 'order_id');
    }    
    
	public function items()
	{
		return $this->hasMany('App\Models\OrderItem', 'order_id');
	}

	public function shipping()
	{
		return $this->hasOne('App\Models\Shipping', 'order_id');
	}
	
	public function invoice()
	{
		return $this->belongsTo('App\Models\Invoice', 'invoice_id', 'invoice_id');
	}	
	
	public function user()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}
}