<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCancelation extends Model
{
    protected $type;
    
    protected $table = 'order_cancelation';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [
        'order_id',
        'reason',
        'initiated_by',
    ];
    
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }
    
}