<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [
        'user_id',
        'invoice_id',
        'order_id',
        'shipping_id',
        'invoice_amt_total',
        'status'
    ];
    
    public const STATUS_ORDERED = 1;
    public const STATUS_TRANSIT = 2;
	public const STATUS_PICKUP = 3;
	public const STATUS_DELIVERED = 4;
	public const STATUS_CANCELED = 5;
		
	public static function getStatus()
	{
	    return [
	        self::STATUS_ORDERED => "Ordered",
	        self::STATUS_TRANSIT => "Transit",
	        self::STATUS_PICKUP => "Pickup",
	        self::STATUS_DELIVERED => "Delivered",
	        self::STATUS_CANCELED => "Canceled",
	   ];
	}
	
	public function shipping()
	{
		return $this->hasOne('App\Models\Shipping', 'shipping_id');
	}
	
	public function payment()
	{
	  return $this->belongsTo('App\Models\Payment','invoice_id');  
	}
	
}