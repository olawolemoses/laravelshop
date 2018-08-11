<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //

    protected $casts = [
     'location_id' => 'int',
     'show_status' => 'int'
    ];

   protected $dates = [
   	'start_date',
   	'end_date'
   ];

    protected $fillable = [

    	'title',
    	'description',
    	'banner_filename',
    	'show_status',
    	'sponsored',
    	'start_date',
    	'end_date'
    ];
}
