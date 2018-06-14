<?php

namespace App;

use App\Address;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
	
	public function stringify()
	{
		$adr = $this->address;
		return '{"site_name":"'.$this->name.'","site_siret":"'.$this->siret.'","site_id":"'.$this->id.'","site_street": "'.$adr->street.'", "site_street_extra":"'.$adr->street_extra.'","site_post_code": "'.$adr->post_code.'","site_city": "'.$adr->city.'","site_state": "'.$adr->state.'"}';
	}
	
	public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
	
	public function address()
	{
		return $this->belongsTo('App\Address');
	}
	
	public function set_address( $adr )
	{
		$address = Address::findOrNew( $this->id );
		
		foreach( $adr as $k=>$v ){
			$address->$k = $v;
		}
		$address->is_active = true;
		$address->save();

		$this->address_id = $address->id;
	}
	
	public function machines() 
	{
		return $this->hasMany('App\Machine');
	}
}
