<h1 class="card-title">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" value="@if( isset($machine) ) {{$machine->name}} @endif" class="input-field"/>
</h1>

<h2 class="card-title">
	<label for="serial">Serial number</label>
	<input type="text" name="serial" id="serial" value="@if( isset($machine) ) {{$machine->serial}} @endif" class="input-field"/>
</h2>

<input type="checkbox" name="is_active" id="is_active" value="1" @if( isset($machine) && $machine->is_active ) checked @endif class="input-field"/>
<label for="is_active">Active</label>