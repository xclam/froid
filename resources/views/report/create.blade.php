@extends('layouts.layout')


@section('content')

	{{ Form::open(array('url' => 'report')) }}
	
		<div class="form-group">
			<label for="customer">Customer</label>
			<select name="customer_id" id="customer" class="form-control input-field">
				<option value="">Select a customer</option>
				@foreach( $customers as $key=>$val )
					<option value="{{$key}}">{{$val}}</option>
				@endforeach
			</select>
		</div> 
		
		<div class="form-group">
			<label for="machine">Machine</label>
			<select name="machine_id" id="machine" class="form-control input-field">
				<option value="">Select a machine</option>
				@foreach( $machines as $machine )
					<option value="{{$machine->id}}" data-customer="{{$machine->customer_id}}">{{$machine->name}}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<h2>Nature de l'intervention</h2>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" value="1" name="ndi1" id="ndi1">
				<label for="ndi1">Assemblage de l'equipement</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" value="1" name="ndi2" id="ndi2">
				<label for="ndi2">Mise en service de l'equipement</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" value="1" name="ndi3" id="ndi3">
				<label for="ndi3">Modification de equipement</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" value="1" name="ndi4" id="ndi4">
				<label for="ndi4">Maintenance de equipement</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" value="1" name="ndi5" id="ndi5">
				<label for="ndi5">Controle d'etancheite periodique</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" value="1" name="ndi6" id="ndi6">
				<label for="ndi6">Controle d'etancheite non periodique</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" value="1" name="ndi7" id="ndi7">
				<label for="ndi7">Dementelement</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" value="1" name="ndi8" id="ndi8">
				<label for="ndi8">Autre (préciser)</label>
			</div>
		</div> 		
		
		<div class="form-group">
			<h2>Quantité de fluide</h2>
			<div>
				<h3>HCFC</h3>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" value="1" name="hcfc1" id="hcfc1">
					<label for="hcfc1">2kg</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" value="1" name="hcfc2" id="hcfc2">
					<label for="hcfc2">30kg</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" value="1" name="hcfc3" id="hcfc3">
					<label for="hcfc3">300kg</label>
				</div>
			</div>
		</div> 		
	
		<div class="form-group">
			<h2>Présence d'un systeme de detection des fuites</h2>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" value="1" name="sdf" id="sdf">
				<label for="sdf">oui</label>
			</div>
		</div> 		
		
		<div class="form-group">
			<label for="fc">Fuite constatée</label>
			<input type="text" name="fc" id="fc" class="form-control input-field"/>
		</div> 	

		<div class="form-group">
			<label for="machine">Questionnaire</label>
		</div> 		

		<div class="form-group">
			<label for="performance">Prestation</label>
			<textarea id="performance" name="performance"></textarea>
		</div> 	

		<div class="form-group">
			<label for="supplies">Fournitures</label>
			<textarea id="supplies" name="supplies"></textarea>
		</div> 	

		<div class="form-group">
			<label for="to_be_done">Reste à faire</label>
			<textarea id="to_be_done" name="to_be_done"></textarea>
		</div> 	
		
		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}

@endsection