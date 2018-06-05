@extends('layouts.layout')

@section('content')

	<a href="/user/create">Create</a>
	
<table class="table">
	<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">Firstname</th>
			<th scope="col">Lastname</th>
			<th scope="col">Phone</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach( $users as $user )
			<tr>
				<th scope="row"><input type="checkbox" name="user_{{ $user->id }}" value="{{ $user->id }}" /></th>
				<td data-href="/user/{{ $user->id }}" class="clickable">{{ $user->firstname }}</td>
				<td data-href="/user/{{ $user->id }}" class="clickable">{{ $user->lastname }}</td>
				<td data-href="/user/{{ $user->id }}" class="clickable">{{ $user->phone }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection