<h1 class="card-title">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" value="@if( isset($role) ) {{$role->name}} @endif" class="input-field"
	required/>
</h1>

<h1 class="card-title">
	<label for="description">Description</label>
	<input type="text" name="description" id="description" value="@if( isset($role) ) {{$role->description}} @endif" class="input-field"
	required/>
</h1>
