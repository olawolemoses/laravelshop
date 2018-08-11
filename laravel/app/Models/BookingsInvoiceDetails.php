<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingsInvoiceDetails extends Model
{
    protected $table = 'booking_invoice_details';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
		'user_id',
		'service_id',
		'slot_hour_id',
		'invoice_id',
		'amount_paid',
    ];
	
	
}
