@extends('layouts.layout')


@section('content')

@if( sizeof($reports) == 0 ) 
	Create a new report
@else
<table class="table">
	<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">Customer</th>
			<th scope="col">Machine</th>
			<th scope="col">--</th>
			<th scope="col">--</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach( $reports as $report )
			<tr>
				<th scope="row"><input type="checkbox" name="report_{{ $report->id }}" value="{{ $report->id }}" /></th>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->customer_id }}</td>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->machine_id }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endif

@endsection