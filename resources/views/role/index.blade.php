@extends('layouts.layout')

@section('content')

	<a href="/role/create">Create</a>
	
<table class="table">
	<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">Name</th>
			<th scope="col">Description</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach( $roles as $role )
			<tr>
				<th scope="row"><input type="checkbox" name="role_{{ $role->id }}" value="{{ $role->id }}" /></th>
				<td data-href="/role/{{ $role->id }}" class="clickable">{{ $role->name }}</td>
				<td data-href="/role/{{ $role->id }}" class="clickable">{{ $role->description }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection