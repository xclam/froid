<div class="img-profile"></div>

<h1 class="card-title">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" value="@if( isset($customer) ) {{$customer->name}} @endif" class="input-field"
	required/>
</h1>

<input type="checkbox" name="is_active" id="is_active" value="1" @if( isset($customer) && $customer->is_active ) checked @endif class="input-field"/>
	<label for="is_active">Active</label>
	
<input type="checkbox" name="is_society" id="is_society" value="1" @if( isset($customer) && $customer->is_society ) checked @endif class="input-field"
	data-status_change="is_society_change"/>
	<label for="is_society">Society</label>