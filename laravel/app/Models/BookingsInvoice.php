<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingsInvoice extends Model
{
    protected $table = 'booking_invoice';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
		'user_id',
		'invoice_id',
		'total_amount',
		'token',
		'status'
    ];
	
	
}
