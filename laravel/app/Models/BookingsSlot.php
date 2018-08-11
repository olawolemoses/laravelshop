<?php

namespace App\Models;

use App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class BookingsSlot extends Model
{
    protected $table = 'bookings_slot';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
    ];

	public function service()
	{
		return $this->belongsTo('App\Models\Service', 'service_id');
	}
}
