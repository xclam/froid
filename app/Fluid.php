<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fluid extends Model
{
    protected $fillable = ['name','fluid_load','gwp'];
	
	public function machines()
	{
	  return $this->belongsToMany(Machine::class);
	}
}
