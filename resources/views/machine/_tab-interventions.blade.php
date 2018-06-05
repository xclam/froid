@if(isset($machine))
<table class="table">
	<thead>
		<tr>
			<th>Number</th>
			<th>Intervention date</th>
		</tr>
	</thead>
	
	<tbody>
	@foreach( $machine->interventions as $interv )
		<tr>
			<td data-href="/report/{{ $interv->id }}" class="clickable">{{$interv->number}}</td>
			<td data-href="/report/{{ $interv->id }}" class="clickable">{{$interv->created_at}}</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endif