<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function address()
	{
		return $this->belongsTo('App\Address');
	}
	
	public function set_address( $adr )
	{
		$address = Address::findOrNew( $this->address_id );
		
		foreach( $adr as $k=>$v ){
			$address->$k = $v;
		}
		$address->is_active = true;
		$address->save();

		$this->address_id = $address->id;
	}
	
	public function logo()
	{
		return $this->belongsTo('App\Images_Manager', 'image_id', 'id');
	}
}
