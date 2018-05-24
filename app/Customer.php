<?php

namespace App;

use App\Address;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	
	protected $fillable = ['name','firstname','lastname','is_society','is_active','siret','phone','mobile','fax','email','website'];
	
			
	
    public function get_address()
	{
		$address = new Address();
		$a = $address->find($this->address_id);
		if($a === NULL)
			$a = new Address();
		
		return $a;
	}

}
