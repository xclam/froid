<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//@TODO : set is_active to true by default
//@TODO : passer par une table d'association x.id->address.id

class Address extends Model
{
    protected $fillable = ['street','street_extra','post_code','city','state','is_active'];
	
	public static function findOrCreate( $id )
	{
		$obj = static::find($id);
		return $obj ?: new static;
	}
	
	public function __toString()
	{
		return $this->street."\n".$this->street_extra."\n".$this->post_code.' '.$this->city."\n".$this->state;
	}
}
