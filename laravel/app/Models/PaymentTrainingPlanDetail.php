<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTrainingPlanDetail extends Model
{
    protected $table = 'payment_training_plan_details';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [
    ];

}