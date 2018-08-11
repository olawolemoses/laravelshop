<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [
        'user_payment_method_id',
        'invoice_id',
        'payment_gateway_response'
    ];
    
    public function invoice()
    {
        return $this->hasOne('App\Models\Invoice','invoice_id');
    }

}