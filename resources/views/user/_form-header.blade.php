<div class="img-profile"></div>

<h1 class="card-title">
	<label for="name">Name</label>
	<input type="text" name="name" id="name" value="@if( isset($user) ) {{$user->name}} @endif" class="input-field"
	required/>
</h1>

<h1 class="card-title">
	<label for="email">Email</label>
	<input type="text" name="email" id="email" value="@if( isset($user) ) {{$user->email}} @endif" class="input-field"
	required/>
</h1>
