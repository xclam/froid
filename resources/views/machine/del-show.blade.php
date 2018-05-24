@extends('machine.mask-machine')


{{ Form::open(array('url' => 'machine/' . $machine->id, 'class' => 'pull-right')) }}
	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
{{ Form::close() }}
	
@section('form')
	{{ Form::open(array('url' => 'machine')) }}
@endsection

@section('mask-nav-bar')
	<a href="/machine/{{ $machine->id }}/edit" class="btn">Modify</a>
	
	
	
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

