<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTrainingSubscription extends Model
{
    protected $table = 'payment_training_subscription';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [
        'payment_plan_id',
        'user_id'
    ];
    
    public function training_plan_fulfillment()
    {
        return $this->hasMany('App\Models\PaymentTrainingFulfillment', 'subscription_id');
    }
    
    public function training_plan()
    {
        return $this->belongsTo('App\Models\PaymentTrainingPlan', 'payment_plan_id');
    }
}