<div class="row">
	
	<div class="col-4">
		<div id="sites-table">	
			@if(isset($customer))
				@foreach( $customer->sites as $l=>$site )
					<input type="text" id="{{$site->id}}'" name="site_adr_{{$l}}" data-line="{{$l}}" 
						class="form-control input-field adr-name" 
						data-status_change="update_site" 
						data-onclick="load_site"
						value="{{$site->name}}" />
					<input type="hidden" data-line="{{$l}}" id="site_adr" name="site_adr_{{$l}}" 
						value="{{$site->stringify()}}" />
				@endforeach
			@endif
		</div>
		<div class="input-field" data-onclick="add_customer_site">+ add</div>
	</div>
	
	<div class="col-8 address-site">
		<input type="hidden" id="adr_line" value="" />
		<div class="form-group">
			<label for="siret">Siret</label>
			<input type="text" id="site_siret" class="form-control input-field" name="site_siret" 

				data-status_change="update_site" />
		</div> 
		
		<div class="form-group">
			<label for="street">Street</label>
			<input type="text" id="site_street" class="form-control input-field" name="site_street" 
				data-status_change="update_site" />
		</div> 
		
		<div class="form-group">
			<label for="street_extra">Street</label>
			<input type="text" id="site_street_extra" class="form-control input-field" name="site_street_extra"
				data-status_change="update_site" />
		</div> 
		
		<div class="form-group">
			<label for="post_code">Post code</label>
			<input type="text" id="site_post_code" class="form-control input-field" name="site_post_code" 
				data-status_change="update_site" />
		</div> 
		
		<div class="form-group">
			<label for="city">City</label>
			<input type="text" id="site_city" class="form-control input-field" name="site_city" 
				data-status_change="update_site" />
		</div> 
		
		<div class="form-group">
			<label for="state">State</label>
			<input type="text" id="site_state" class="form-control input-field" name="site_state" 
				data-status_change="update_site" />
		</div> 
		
	</div>
	
</div>