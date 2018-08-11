<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $table = 'delivery_address';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'street',
        'city',
        'state',
        'country',
        'mobile_no',
    ];
    
}