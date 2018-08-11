<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingsUserInfo extends Model
{
    protected $table = 'bookings_user_info';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
		'user_id',
		'name',
		'phone_no',
		'email',
		'message',
		'booking_session_id'
    ];
	
	
}
