<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTrainingPlan extends Model
{
    protected $table = 'payment_training_plans';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [];
    
    public function training_plan_details()
    {
        return $this->hasMany('App\Models\PaymentTrainingPlanDetail', 'payment_training_plan_id');
    }
    
    public function training_package()
    {
        return $this->belongsTo('App\Models\TrainingPackage', 'package_id');
    }    
}