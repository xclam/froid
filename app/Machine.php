<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = ['name','serial_number','is_active','brand','model','customer_id','internal_number'];
	
	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}
	
	public function interventions()
	{
		return $this->hasMany('App\Report');
	}
	
	public function fluids()
	{
		return $this->hasMany('App\Fluid');
	}
}
