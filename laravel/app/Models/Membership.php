<?php

namespace App\Models;

use App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
    ];

// 	public function item()
// 	{
// 		return $this->belongsTo('App\Models\Item', 'item_id');
// 	}

// 	public function category()
// 	{
//         return $this->hasOne('App\Models\Category');
//  }
    
	public function training_packages()
	{
        return $this->hasMany('App\Models\MembershipSubscriptions', 'membership_id');
    }    
}
