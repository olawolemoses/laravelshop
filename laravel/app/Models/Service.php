<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
     protected  $casts = [

   ];

  protected $dates = [

   ];

   protected $fillable = [
       
       'service_name',
       'service_description',
       'service_price',
       'service_image',
   ];
}
