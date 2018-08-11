<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $type;
    
    protected $table = 'items';
    
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [];
    
    protected $fillable = [
        'SKU',
        'item_type',
        'featured',
        'active',
        'secure',
    ];
    
    public function get_type()
    {
        if( $this->item_type == 1)
        
            return $this->product;
        
        elseif( $this->item_type == 2 )
        
            return $this->service;
        
        elseif( $this->item_type == 3 )
        
            return $this->training;
    }
    

	public function service()
	{
		return $this->hasOne('App\Models\Service', 'item_id');
	}
	
	public function product()
	{
		return $this->hasOne('App\Models\Product', 'item_id');
	}
	
	public function training()
	{
		return $this->hasOne('App\Models\Training', 'item_id');
	}

    public function get_image()
    {
        return $this->get_type()->image();
    }
    
    
    public function get_name()
    {
        return $this->get_type()->name();
    }
    
    public function get_amount()
    {
        return $this->get_type()->amount();
    }
    
    public function get_date()
    {
        return $this->get_type()->date();
    }
}