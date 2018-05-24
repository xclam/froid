<div class="row">
	
	<div class="col-7">
	
		<div class="form-group">
			<label for="siret">Siret</label>
			<input type="text" id="siret" class="form-control input-field" name="siret" value="@if(isset($customer->siret)){{$customer->siret}}@endif"
				data-control_change="checkSiret"/>
		</div> 
		
		<div class="form-group">
			<label for="street">Street</label>
			<input type="text" id="street" class="form-control input-field" name="street" value="@if(isset($address->street)){{$address->street}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="street_extra">Street</label>
			<input type="text" id="street_extra" class="form-control input-field" name="street_extra" value="@if(isset($address->street_extra)){{$address->street_extra}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="post_code">Post code</label>
			<input type="text" id="post_code" class="form-control input-field" name="post_code" value="@if(isset($address->post_code)){{$address->post_code}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="city">City</label>
			<input type="text" id="city" class="form-control input-field" name="city" value="@if(isset($address->city)){{$address->city}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="state">State</label>
			<input type="text" id="state" class="form-control input-field" name="state" value="@if(isset($address->state)){{$address->state}}@endif"/>
		</div> 

	</div>
	
	<div class="col-5">

		<div class="form-group">
			<label for="website">Website</label>
			<input type="text" id="website" class="form-control input-field" name="website" value="@if(isset($customer->website)){{$customer->website}}@endif"/>
		</div> 

	</div>
	
</div>

 