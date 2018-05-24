@extends('machine.mask-machine')

@section('form')
	{{ Form::model($machine, array('route' => array('machine.update', $machine->id), 'method' => 'PUT')) }}
@endsection

@section('mask-nav-bar')
	<button type="submit" class="btn update-btn" data-action="update" disabled>Update</button>
@endsection



@section('mask-header-content')

	<h1 class="card-title">
		Name
		@if( isset( $machine->name ) )	<span class="field">{{ $machine->name }}</span> @endif
	</h1>
	<h2 class="card-title">
		Serial number
		@if( isset( $machine->serial ) )	<span class="field">{{ $machine->serial }}</span> @endif
	</h2>
	@if($machine->is_active) <i class="fas fa-check-square"></i> @endif <span class="field">Active</span>

@endsection



