@extends('machine.mask-machine')

@section('form')
	{{ Form::open(array('url' => 'machine')) }}
@endsection

@section('mask-nav-bar')
	<button type="submit" class="btn create-btn" data-action="create" disabled>Create</button>
	
	{{ Form::open(array('url' => 'machine/' . $machine->id, 'class' => 'pull-right')) }}
		{{ Form::hidden('_method', 'DELETE') }}
		{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
	{{ Form::close() }}
	
@endsection


@section('mask-header-content')

	<div class="img-profile"></div>
	<h1 class="card-title">
		Name
		<input type="text" name="name" value="" />
	</h1>
	<h2 class="card-title">
		Serial number
		<input type="text" name="serial" value="" />
	</h2>
	<input type="checkbox" name="is_active" value="1" />Active
	

@endsection
