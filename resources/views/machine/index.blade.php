@extends('layouts.layout')


@section('content')
@if( sizeof($machines) == 0 ) 
	Create a new machine
@else
<table class="table">
	<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">Customer</th>
			<th scope="col">Name</th>
			<th scope="col">Brand</th>
			<th scope="col">Model</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach( $machines as $machine )
			<tr>
				<th scope="row"><input type="checkbox" name="machine_{{ $machine->id }}" value="{{ $machine->id }}" /></th>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->customer_id }}</td>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->name }}</td>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->brand }}</td>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->model }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endif

@endsection