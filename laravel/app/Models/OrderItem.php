<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $type;
    
    protected $table = 'order_items';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [
        'order_id',
        'item_id',
        'qty',
        'unit_price'
    ];
    
    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id');
    }
    
}