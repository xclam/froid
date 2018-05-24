<div class="row">
	
	<div class="col-6">
	
		<div class="form-group">
			<label for="brand">Brand</label>
			<input type="text" id="siret" class="form-control input-field" name="brand" value="@if(isset($machine->brand)){{$machine->brand}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="model">Model</label>
			<input type="text" id="siret" class="form-control input-field" name="model" value="@if(isset($machine->model)){{$machine->model}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="internal_number">Internal Number</label>
			<input type="text" id="internal_number" class="form-control input-field" name="internal_number" value="@if(isset($machine->internal_number)){{$machine->internal_number}}@endif"/>
		</div> 
		
	</div>
		
	<div class="col-6">

		<div class="form-group">
			<label for="customer">Customer</label>
			<select name="customer_id" id="customer" class="form-control input-field">
				<option value="">Select a customer</option>
				@foreach( $customers as $key=>$val )
					<option value="{{$key}}" @if(isset($machine) && $key == $machine->customer_id) selected @endif>{{$val}}</option>
				@endforeach
			</select>
		</div> 
		
		

	</div>
	
</div>

<?php //dd($machine); ?>