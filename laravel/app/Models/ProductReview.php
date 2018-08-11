<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    //
     protected  $casts = [

   ];

  protected $dates = [

   ];

   protected $fillable = [

   ];
   
   	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
}
