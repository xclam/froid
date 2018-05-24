<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//@TODO : set is_active to true by default

class Address extends Model
{
    protected $fillable = ['street','street_extra','post_code','city','state','is_active'];
}
