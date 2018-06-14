<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    
	
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
	
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	
	public function teqco2()
	{
		return $this->machine->fluids[0]->gwp / 1000 * $this->machine->fluids[0]->pivot->load;
	}
	
	public function qty_loaded()
	{
		return $this->fluide_vierge + $this->fluide_recycle + $this->fluide_regenere;
	}
	
	public function qty_recovered()
	{
		return $this->fluide_traitement + $this->fluide_conserve;
	}
	
	public function medias()
	{
		//@TODO: change to media
	  return $this->belongsToMany(Media::class)->withPivot('id','status'); 
	}
	
	public function fill_bsd()
	{
		$cpy = Company::first();
		
		$txt[0] = "";
		$txt[1] = $cpy->name."\n".str_replace("\n", " ", $cpy->address)."\nSIRET : ".$cpy->siret;
		$txt[2] = $cpy->certificate;
		$txt[3] = $this->customer->name."\n".str_replace("\n", " ", $this->customer->address)."\n SIRET : ".$this->customer->siret;
		$txt[4] = $this->machine->brand.' '.$this->machine->model;
		$txt[5] = $this->machine->fluids[0]->name;
		$txt[6] = $this->machine->fluids[0]->pivot->load;
		$txt[7] = ""; // rempli plus bas
		$txt[8] = "";
		$txt[9] = "";
		$txt[10] = "";
		$txt[11] = "";
		$txt[12] = "";
		$txt[13] = "";
		$chk[0] = "1";
		$chk[1] = '1';
		$chk[2] = 1;
		$chk[3] = 'Off';
		$chk[4] = "Off";
		$chk[5] = "x";
		$chk[6] = "v";
		$chk[7] = 1;
		
		$rdo[0] = ($this->machine->leak_detector)? 1:2;
		if($this->machine->fluids[0]->pivot->load < 30)
			$rdo[1] = 1;
		else if($this->machine->fluids[0]->pivot->load >= 300)
			$rdo[1] = 3;
		else
			$rdo[1] = 2;
		// $eqt = $this->machine->fluids[0]->gwp / 1000 * $this->machine->fluids[0]->pivot->load;
		$eqt = $this->teqco2();
		$txt[7] = $eqt;
		if($eqt < 50)
			$rdo[2] = 1;
		else if($eqt >= 500)
			$rdo[2] = 3;
		else
			$rdo[2] = 2;

		
		if($this->machine->leak_detector){	
			$rdo[3] = 0;
			$rdo[4] = $rdo[1];
		}else{
			$rdo[4] = 0;
			$rdo[3] = $rdo[1];
			
		}
		$rdo[5] = 1;
		
		$txt[14] = $this->fc1;
		$txt[15] = $this->fc2;
		$txt[16] = $this->fc3;
		
		$rdo[6] = ( $this->fcr1 == null) ? "Off" : $this->fcr1;
		$rdo[7] = ( $this->fcr2 == null) ? "Off" : $this->fcr2;
		$rdo[8] = ( $this->fcr3 == null) ? "Off" : $this->fcr3;
		
		$txt[17] = $this->qty_loaded();
		$txt[18] = $this->fluide_vierge;
		$txt[19] = $this->fluide_recycle;
		$txt[20] = $this->fluide_regenere;
		$txt[21] = $this->qty_recovered();
		$txt[22] = $this->fluide_traitement;
		$txt[23] = $this->fluide_conserve;
		$txt[24] = $this->contenant;
		
		$fdf = '%FDF-1.2
1 0 obj<</FDF<< /Fields[
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[0])/V('.$txt[0].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[1])/V('.$txt[1].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[2])/V('.$txt[2].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[3])/V('.$txt[3].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[4])/V('.$txt[4].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[5])/V('.$txt[5].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[6])/V('.$txt[6].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[7])/V('.$txt[7].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[8])/V('.$txt[8].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[0] .')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[1].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[2].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[3].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[4].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[5].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[6].')>>
<</T(topmostSubform[0].Page1[0].Case_&#224;_cocher1[0])/V('.$chk[7].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[9])/V('.$txt[9].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[10])/V('.$txt[10].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[11])/V('.$txt[11].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[12])/V('.$txt[12].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[13])/V('.$txt[13].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[0])/V('.$rdo[0].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[1])/V('.$rdo[1].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[2])/V('.$rdo[2].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[3])/V('.$rdo[3].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[4])/V('.$rdo[4].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[5])/V('.$rdo[5].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[14])/V('.$txt[14].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[15])/V('.$txt[15].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[16])/V('.$txt[16].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[6])/V('.$rdo[6].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[7])/V('.$rdo[7].')>>
<</T(topmostSubform[0].Page1[0].Groupe_de_boutons_radio[8])/V('.$rdo[8].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[17])/V('.$txt[17].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[18])/V('.$txt[18].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[19])/V('.$txt[19].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[20])/V('.$txt[20].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[21])/V('.$txt[21].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[22])/V('.$txt[22].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[23])/V('.$txt[23].')>>
<</T(topmostSubform[0].Page1[0].Champ_de_texte1[24])/V('.$txt[24].')>>
] >> >>
endobj
trailer
<</Root 1 0 R>>
%%EOF';
 
	file_put_contents( $this->number.'-test.fdf', $fdf );

	exec("pdftk cerfa_15497-02.pdf fill_form ".$this->number."-test.fdf output ".$this->number.".pdf flatten");
	
	}
	
	
}
