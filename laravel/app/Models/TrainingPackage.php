<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingPackage extends Model
{
    protected $table = 'training_packages';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [
        'training_id',
    ];
    
    public function training()
    {
        return $this->belongsTo('App\Models\Training', 'training_id');
    }
    
	public function training_plans()
	{
        return $this->hasMany('App\Models\PaymentTrainingPlan', 'package_id');
    }    
}