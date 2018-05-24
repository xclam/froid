@extends('customer.mask-customer')

@section('form')
	{{ Form::open(array('url' => 'customer')) }}
@endsection

@section('mask-nav-bar')
	<button type="submit" class="btn create-btn" data-action="create" disabled>Create</button>
@endsection


@section('mask-header-content')

	<div class="img-profile"></div>
	<h1 class="card-title">
		Name
		<input type="text" name="name" value="" />
	</h1>
	<input type="checkbox" name="is_active" value="1" />Active
	<input type="checkbox" name="is_society" value="1" />Society

@endsection
