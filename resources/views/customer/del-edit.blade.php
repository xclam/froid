@extends('customer.mask-customer')

@section('form')
	{{ Form::model($customer, array('route' => array('customer.update', $customer->id), 'method' => 'PUT')) }}
@endsection

@section('mask-nav-bar')
	<button type="submit" class="btn update-btn" data-action="update" disabled>Update</button>
@endsection



@section('mask-header-content')

		<div class="img-profile"></div>
		<h1 class="card-title">
			<label>Name</label>
			<input type="text" name="name" id="name" value="{{$customer->name}}" />
		</h1>
		<input type="checkbox" name="is_active" value="1" @if($customer->is_active) checked @endif /><label>Active</label>
		<input type="checkbox" name="is_society" value="1" @if($customer->is_society) checked @endif /><label>Society</label>

@endsection



