<div class="img-profile"></div>

<h1 class="card-title">
	<label for="name">{{__("Name")}}</label>
	<input type="text" name="name" id="name" value="@if( isset($customer) ) {{$customer->name}} @endif" class="input-field"
	required/>
</h1>

{{Form::label('is_active',__('Active'))}}
{{Form::switchbox( 'is_active', 1, (isset($customer) && $customer->is_active), ['class'=>'input-field'])}}

{{Form::label('is_society',__('Society'))}}
{{Form::switchbox( 'is_society', 1, (isset($customer) && $customer->is_society), ['class'=>'input-field'])}}

	