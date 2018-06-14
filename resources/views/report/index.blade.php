@extends('layouts.layout')

@section('cta')
<h2 style="width:50%;">Reports</h2>
<form class="form-inline my-2 my-lg-0" style="width:50%;">
	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="s">
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
<a class="btn btn-primary" href="/report/create" role="button">Create</a>
@endsection


@section('content')

@if( sizeof($reports) == 0 ) 
	Create a new report
@else
	
	@if( sizeof($my_reports) > 0)

		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col"></th>
					<th scope="col">Intervention</th>
					<th scope="col">Customer</th>
					<th scope="col">Site</th>
					<th scope="col">Machine</th>
					<th scope="col">Date</th>
				</tr>
			</thead>
			
			<tbody>
				@foreach( $my_reports as $report )
					<tr>
						<th scope="row"><input type="checkbox" name="report_{{ $report->id }}" value="{{ $report->id }}" /></th>
						<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->number }}</td>
						<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->customer->name or ''}}</td>
						<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->site->name or ''}}</td>
						<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->machine->name  or ''}}</td>
						<td data-href="/report/{{ $report->id }}" class="clickable">{{ date('d/m/Y', strtotime($report->intervention_date)) }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
	@endif

<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">Intervention</th>
			<th scope="col">Customer</th>
			<th scope="col">Site</th>
			<th scope="col">Machine</th>
			<th scope="col">Date</th>
			<th scope="col">Status</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach( $reports as $report )
			<tr>
				<th scope="row"><input type="checkbox" name="report_{{ $report->id }}" value="{{ $report->id }}" /></th>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->number }}</td>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->customer->name or ''}}</td>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->site->name or ''}}</td>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ $report->machine->name  or ''}}</td>
				<td data-href="/report/{{ $report->id }}" class="clickable">{{ date('d/m/Y', strtotime($report->intervention_date)) }}</td>
				<td data-href="/report/{{ $report->id }}" class="clickable">
					@if($report->is_validate) 
						Validé
					@elseif($report->is_open)
						En cours
					@else
						Términé
					@endif
				</td>				
			</tr>
		@endforeach
	</tbody>
</table>

@endif

@endsection