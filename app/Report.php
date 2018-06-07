<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    
	function generatePDF(){
		
	}
	
	public function machine()
	{
		return $this->belongsTo('App\Machine');
	}
	
	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}
	
	public function site()
	{
		return $this->belongsTo('App\Site');
	}
}
