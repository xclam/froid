
	<label for="firstname">First name</label>
	<input type="text" name="firstname" id="firstname" value="@if( isset($user) ) {{$user->firstname}} @endif" class="input-field"
	required/>

	<label for="lastname">Last name</label>
	<input type="text" name="lastname" id="lastname" value="@if( isset($user) ) {{$user->lastname}} @endif" class="input-field"
	required/>
	
	<label for="phone">Phone</label>
	<input type="text" name="phone" id="phone" value="@if( isset($user) ) {{$user->phone}} @endif" class="input-field"
	required/>
	
	
	
		<label for="roles">Roles</label>
			@if( isset($roles) ) 
				<select name="roles" id="roles" class="form-control input-field">
					<option value="">Select a role</option>
					@foreach( $roles as $role )
						<option value="{{$role->id}}">{{$role->name}}</option>
					@endforeach
				</select>
			@else
				@foreach( $user->roles as $role)
					{{$role->name}}
				@endforeach
			@endif