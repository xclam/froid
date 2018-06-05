@extends('layouts.mask')
{{$company->address}}
{{$company->logo}}
@section('form')
	{{ Form::open(array('url' => 'config/update-cpy/'.$company->id, 'method' => 'put', 'enctype' => 'multipart/form-data')) }}

@endsection

@section('mask-header')
	<div class="img-profile">
		<div class="form-group">
			<label for="logo">
				@if( isset( $company->logo ) )
					<img src="/images/{{$company->logo->image_name}}.{{$company->logo->image_extension}}" />
				@else
					logo
				@endif
			</label>
			<input type="file" id="logo" class="form-control input-field" name="logo"/>
		 </div>
	</div>

	<h1 class="card-title">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="@if( isset($company) ){{$company->name}}@endif" class="input-field"
		required/>
	</h1>
	
	<h2 class="card-title">
		<label for="certificate">Capacity certificate</label>
		<input type="text" name="certificate" id="certificate" value="@if( isset($company) ){{$company->certificate}}@endif" class="input-field"
		required/>
	</h2>

	<div class="form-group">
		<label for="siret">Siret</label>
		<input type="text" id="siret" class="form-control input-field" name="siret" value="@if(isset($company->siret)){{$company->siret}}@endif"
			data-control_change="checkSiret"/>
	</div> 
	
	
	<div class="form-group">
			<label for="street">Street</label>
			<input type="text" id="street" class="form-control input-field" name="street" value="@if(isset($company->address->street)){{$company->address->street}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="street_extra">Street</label>
			<input type="text" id="street_extra" class="form-control input-field" name="street_extra" value="@if(isset($company->address->street_extra)){{$company->address->street_extra}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="post_code">Post code</label>
			<input type="text" id="post_code" class="form-control input-field" name="post_code" value="@if(isset($company->address->post_code)){{$company->address->post_code}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="city">City</label>
			<input type="text" id="city" class="form-control input-field" name="city" value="@if(isset($company->address->city)){{$company->address->city}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="state">State</label>
			<input type="text" id="state" class="form-control input-field" name="state" value="@if(isset($company->address->state)){{$company->address->state}}@endif"/>
		</div> 
		
		<div class="form-group">
			<label for="website">Website</label>
			<input type="text" id="website" class="form-control input-field" name="website" value="@if(isset($company->website)){{$company->website}}@endif"/>
		</div> 
@endsection




@section('mask-footer')

@endsection

@push('script')

@endpush