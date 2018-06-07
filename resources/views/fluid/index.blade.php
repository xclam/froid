@extends('layouts.layout')

@section('content')

	<a href="/fluid/create">Create</a>
	
<table class="table">
	<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">Name</th>
			<th scope="col">GWP</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach( $fluids as $fluid )
			<tr>
				<th scope="row"><input type="checkbox" name="fluid_{{ $fluid->id }}" value="{{ $fluid->id }}" /></th>
				<td data-href="/fluid/{{ $fluid->id }}" class="clickable">{{ $fluid->name }}</td>
				<td data-href="/fluid/{{ $fluid->id }}" class="clickable">{{ $fluid->gwp }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection