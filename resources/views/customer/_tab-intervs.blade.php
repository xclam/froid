
@if( isset( $customer->interventions ) )
	
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Number</th>
				<th scope="col">Machine</th>
				<th scope="col">Date</th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
			
		@foreach( $customer->interventions as $intervention )
					
			<tr>
				<td data-href="/report/{{ $intervention->id }}" class="clickable">{{ $intervention->number }}</td>
				<td data-href="/report/{{ $intervention->id }}" class="clickable">{{ $intervention->machine->name }}</td>
				<td data-href="/report/{{ $intervention->id }}" class="clickable">{{ $intervention->intervention_date }}</td>
				<td>☰</td>
			</tr>
		@endforeach
		
		</tbody>
	</table>
	
@endif