<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTrainingFulfillment extends Model
{
    protected $table = 'payment_training_fulfillment';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [
        'payment_plan_detail_id',
        'payment_plan_id',
        'user_id',
        'invoice_id',
        'subscription_id',
        'amount_paid',
        'status',
        'token'
    ];
    
    public function subscription()
    {
        return $this->belongsTo('App\Models\PaymentTrainingSubscription', 'subscription_id');
    }

    public function payment_training_plan()
    {
        return $this->belongsTo('App\Models\PaymentTrainingPlan', 'payment_plan_id');
    }
    
    public function payment_training_plan_detail()
    {
        return $this->belongsTo('App\Models\PaymentTrainingPlan', 'payment_plan_id');
    }    
}