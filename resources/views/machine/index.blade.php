@extends('layouts.layout')

@section('title')
Machine
@endsection

@section('breadcrumb')
<li>Machine</li>
@endsection

@section('search')
<form class="form-inline my-2 my-lg-0" style="width:50%;">
	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="s">
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection

@section('control-nav')
<a href="machine/create" class="btn btn-outline-success my-2 my-sm-0">Create</a>
@endsection

@section('content')

{{Html::modelTable(
	$machines, 
	array(
		array(
			'object' => 'customer',
			'slug' => 'name',
			'label' => 'Customer'
		),
		array(
			'object' => 'site',
			'slug' => 'name',
			'label' => 'site'
		),
		array(
			'slug' => 'name',
			'label' => 'Name'
		),
		array(
			'slug' => 'brand',
			'label' => 'Brand'
		),
		array(
			'slug' => 'model',
			'label' => 'Model'
		)
	)
)}}

@endsection







@section('content')
@if( sizeof($machines) == 0 ) 
	Create a new machine
@else
<table class="table">
	<thead>
		<tr>
			<th scope="col"></th>
			<th scope="col">Customer</th>
			<th scope="col">Site</th>
			<th scope="col">Name</th>
			<th scope="col">Brand</th>
			<th scope="col">Model</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach( $machines as $machine )
			<tr>
				<th scope="row"><input type="checkbox" name="machine_{{ $machine->id }}" value="{{ $machine->id }}" /></th>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->customer->name }}</td>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->site->name }}</td>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->name }}</td>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->brand }}</td>
				<td data-href="/machine/{{ $machine->id }}" class="clickable">{{ $machine->model }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endif

@endsection