<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    
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
        'profile_picture'
    ];
    public function address()
    {
        return  $this->street . ' ' . $this->city . ' ' . $this->state . '  ' .  $this->country; 
    }
}