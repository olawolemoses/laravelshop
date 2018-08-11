<?php

namespace App\Models;

use App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class BookingsSlotHour extends Model
{
    protected $table = 'bookings_slot_hour';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [	
    ];
	
	public function slot()
	{
		return $this->belongsTo('App\Models\BookingsSlot', 'slot_id');
	}

	public function hour()
	{
		return $this->belongsTo('App\Models\BookingsHour', 'hour_id');
	}
}