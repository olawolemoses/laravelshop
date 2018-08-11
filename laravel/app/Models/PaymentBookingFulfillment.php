<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentBookingFulfillment extends Model
{
    protected $table = 'payment_booking_fulfillment';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
		'user_id',
		'service_id',
		'slot_hour_id',
		'invoice_id',
		'amount_paid',
		'token'
		'status'
    ];
	
	
}
