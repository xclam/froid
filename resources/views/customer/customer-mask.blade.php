@extends('layouts.mask')

@section('form')
	@if( $action == "customer.create" )
		{{ Form::open(array('url' => 'customer', 'id' => 'customer-create-form', 'class' => 'create-form')) }}
	@elseif( $action == "customer.show" )
		{{ Form::model($customer, array('route' => array('customer.destroy', $customer->id), 'method' => 'DELETE', 'id' => 'customer-show-form', 'class' => 'show-form')) }}
	@elseif( $action == "customer.edit" )
		{{ Form::model($customer, array('route' => array('customer.update', $customer->id), 'method' => 'PUT', 'id' => 'customer-edit-form', 'class' => 'edit-form')) }}
	@endif
@endsection

@section('mask-header')
	@include('customer._form-header')	
@endsection


@section('mask-tabs')

	<ul class="nav nav-tabs" id="customer-nav-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Générale</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="profile-tab" data-toggle="tab" href="#sites" role="tab" aria-controls="sites" aria-selected="false">Sites</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="false">Contacts</a>
		</li>
	</ul>
		
@endsection


@section('mask-content-tab')
	
	<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
		@include('customer._tab-general')			
	</div>
	
	<div class="tab-pane fade" id="sites" role="tabpanel" aria-labelledby="sites-tab">
		@yield('mask-content-tab-sites')
	</div>
	
	<div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
		@yield('mask-content-tab-contacts')
	</div>
			
@endsection


@section('mask-footer')

@endsection

@push('script')
<script src="/js/customer-mask.js"></script>
@endpush