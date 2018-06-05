<?php
	$val = array();
	if( isset( $report->intervention_type ) ){
		$val = explode( '-', $report->intervention_type );
	}
?>


	<div class="custom-control custom-checkbox">
		<input class="custom-control-input" type="checkbox" value="1" name="ndi1" id="ndi1" 
			@if( !empty( $val ) and  $val[0] == 1 ) checked @endif
		/>
		<label for="ndi1" class="custom-control-label">Assemblage de l'equipement</label>
	</div>
	<div class="custom-control custom-checkbox">
		<input class="custom-control-input" type="checkbox" value="1" name="ndi2" id="ndi2"
			@if( !empty( $val ) and  $val[1] == 1 ) checked @endif
		/>
		<label for="ndi2" class="custom-control-label" >Mise en service de l'equipement</label>
	</div>
	<div class="custom-control custom-checkbox">
		<input class="custom-control-input" type="checkbox" value="1" name="ndi3" id="ndi3"
			@if( !empty( $val ) and  $val[2] == 1 ) checked @endif
		/>
		<label for="ndi3" class="custom-control-label">Modification de equipement</label>
	</div>
	<div class="custom-control custom-checkbox">
		<input class="custom-control-input" type="checkbox" value="1" name="ndi4" id="ndi4"
			@if( !empty( $val ) and  $val[3] == 1 ) checked @endif
		/>
		<label for="ndi4" class="custom-control-label">Maintenance de equipement</label>
	</div>
	<div class="custom-control custom-checkbox">
		<input class="custom-control-input" type="checkbox" value="1" name="ndi5" id="ndi5"
			@if( !empty( $val ) and  $val[4] == 1 ) checked @endif
		/>
		<label for="ndi5" class="custom-control-label">Controle d'etancheite periodique</label>
	</div>
	<div class="custom-control custom-checkbox">
		<input class="custom-control-input" type="checkbox" value="1" name="ndi6" id="ndi6"
			@if( !empty( $val ) and  $val[5] == 1 ) checked @endif
		/>
		<label for="ndi6" class="custom-control-label">Controle d'etancheite non periodique</label>
	</div>
	<div class="custom-control custom-checkbox">
		<input class="custom-control-input" type="checkbox" value="1" name="ndi7" id="ndi7"
			@if( !empty( $val ) and  $val[6] == 1 ) checked @endif
		/>
		<label for="ndi7" class="custom-control-label">Dementelement</label>
	</div>
	<div class="custom-control custom-checkbox">
		<input class="custom-control-input" type="checkbox" value="1" name="ndi8" id="ndi8"
			@if( !empty( $val ) and  $val[7] == 1 ) checked @endif
		/>
		<label for="ndi8" class="custom-control-label">Autre (préciser)</label>
	</div>
	