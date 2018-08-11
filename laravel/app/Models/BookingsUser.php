<?php

namespace App\Models;

use App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class BookingsUser extends Model
{
    protected $table = 'bookings_user';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
	
    ];
	
	public function bookingsSlotHour()
	{
		return $this->belongsTo('App\Models\BookingsSlotHour', 'bookings_slot_hour_id');
	}
}
