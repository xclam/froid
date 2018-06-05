@extends('layouts.layout')


@section('content')

@if( sizeof($reports) == 0 ) 
	Create a new report
@else
<table class="table">
	<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">Intervention</th>
			<th scope="col">Customer</th>
			<th scope="col">Machine</th>
			<th scope="col">Date</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach( $reports as $report )
			<tr>
				<th scope="row"><input type="checkbox" name="report_{{ $report->id }}" value="{{ $report->id }}" /></th>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->number }}</td>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->customer->name }}</td>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->machine->name }}</td>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->intervention_date }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endif

@endsection