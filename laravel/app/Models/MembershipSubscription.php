<?php

namespace App\Models;

use App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class MembershipSubscription extends Model
{
    protected $table = 'membership_subscriptions';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
        'amount_paid',
        'membership_id',
        'user_id',
        'status',
        'invoice_id',
        'token',
        'month',
        'year'
    ];

// 	public function item()
// 	{
// 		return $this->belongsTo('App\Models\Item', 'item_id');
// 	}

// 	public function category()
// 	{
//         return $this->hasOne('App\Models\Category');
//     }
    
	public function membership()
	{
        return $this->belongsTo('App\Models\Membership', 'membership_id');
    }    
}
