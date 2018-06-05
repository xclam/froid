@if( isset( $customer->machines ) )
	
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Brand</th>
				<th scope="col">Model</th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
			
		@foreach( $customer->machines as $machine )
					
			<tr>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->name }}</td>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->brand }}</td>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->model }}</td>
				<td>☰</td>
			</tr>
		@endforeach
		
		</tbody>
	</table>
	
@endif