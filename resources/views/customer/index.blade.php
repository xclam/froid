@extends('layouts.layout')


@section('content')

<table class="table">
	<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">Name</th>
			<th scope="col">Website</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach( $customers as $customer )
			<tr>
				<th scope="row"><input type="checkbox" name="customer_{{ $customer->id }}" value="{{ $customer->id }}" /></th>
				<td data-href="/customer/{{ $customer->id }}" class="clickable">{{ $customer->name }}</td>
				<td data-href="/customer/{{ $customer->id }}" class="clickable">{{ $customer->website }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection