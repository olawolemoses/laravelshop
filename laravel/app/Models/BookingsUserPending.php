<?php

namespace App\Models;

use App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class BookingsUserPending extends Model
{
    protected $table = 'bookings_user_pending';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
	
    ];
	
	public function bookingsSlotHour()
	{
		return $this->belongsTo('App\Models\BookingsSlotHour', 'bookings_slot_hour_id');
	}
}
