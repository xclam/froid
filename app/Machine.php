<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = ['name','serial_number','is_active','brand','model','customer_id','internal_number'];
	
}
