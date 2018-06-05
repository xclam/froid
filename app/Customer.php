<?php

namespace App;

use App\Site;
use App\Machine;
use App\Address;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	
	protected $fillable = ['name','firstname','lastname','is_society','is_active','siret','phone','mobile','fax','email','website'];

	
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
	
	public function sites()
	{
		return $this->hasMany('App\Site');
	}
	
	public function set_site( $sites )
	{
		foreach( $sites as $encoded_site){
			$s = json_decode( $encoded_site );
	
			if( isset($s->site_id) )
				$site = Site::findOrNew( $s->site_id );
			else
				$site = new Site();

			$site->customer_id = $this->id;
			$site->name = $s->site_name;
			$site->siret = $s->site_siret;
			
			$address = array( 
				"street"			=> $s->site_street, 
				"street_extra"	=> $s->site_street_extra, 
				"post_code"		=> $s->site_post_code, 
				"city"				=> $s->site_city, 
				"state"			=> $s->site_state 
			);
			if( !is_null( $address ) )
				$site->set_address( $address );
			
			$site->save();
			
		}
			// 
	}
	
	public function machines()
	{
		return $this->hasMany('App\Machine');
	}
	
	public function interventions()
	{
		return $this->hasMany('App\Report');
	}

}
