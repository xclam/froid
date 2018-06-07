<h1 class="card-title">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" value="@if( isset($fluid) ) {{$fluid->name}} @endif" class="input-field"
	required/>
</h1>

<h1 class="card-title">
	<label for="gwp">GWP</label>
	<input type="text" name="gwp" id="gwp" value="@if( isset($fluid) ) {{$fluid->gwp}} @endif" class="input-field"
	required/>
</h1>
