<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images_Manager extends Model
{
	protected $table = "images_managers";
	
    public function upload_img( $file )
	{
		$photoName = time();
		$file->move( public_path('images'), $photoName.'.'.$file->getClientOriginalExtension() );
		$this->image_name = $photoName;
		$this->image_extension = $file->getClientOriginalExtension();
		$this->image_path = public_path('images').'/'.$this->image_name.'.'.$this->image_extension;
		$this->save();
		return $this->id;
	}
}
