<?php

namespace App\Models;

use App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';
    
    protected $dates = [];

    protected $casts = [];
    
    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'stock',
        'product_image',
        'product_details',
        'additional_information',
        'cat_id',
        'item_id'
    ];

	public function item()
	{
		return $this->belongsTo('App\Models\Item', 'item_id');
	}

    public function image()
    {
        return $this->product_image;
    }
    
    public function name()
    {
        return $this->training_title;
    }
    
    public function date()
    {
        return $this->created_at;
    }
    
	public function category()
	{
        return $this->hasOne('App\Models\Category');
    }
    
	public function training_packages()
	{
        return $this->hasMany('App\Models\TrainingPackage', 'training_id');
    }    
}
