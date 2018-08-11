<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;

class Category extends Model
{
    
    protected $fillable =[
    'category_name',
    'category_description'
    ];

    public function product(){

    	return $this->belongsTo('App\Models\Product');
    }
}
