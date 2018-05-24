@extends('customer.mask-customer')

@section('mask-nav-bar')

<a href="/customer/{{ $customer->id }}/edit" class="btn">Modify</a>
<a href="/customer/{{ $customer->id }}" class="btn">Delete</a>

@endsection

@section('mask-header-content')

		<div class="img-profile"></div>
		<h1 class="card-title">
			<span class="field">{{$customer->name}}</span>
		</h1>
		@if($customer->is_active) <i class="fas fa-check-square"></i> @endif <span class="field">Active</span>
		@if($customer->is_society) <i class="fas fa-check-square"></i> @endif <span class="field">Society</span>

@endsection


