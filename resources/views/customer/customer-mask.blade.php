@extends('layouts.mask')



@if( $action == "customer.create" )
	@section('title')
		{{__("Customer create")}}
	@endsection
	@section('breadcrumb')
		<li>{{__("Customer")}}</li> / <li>{{__("Create")}}</li>
	@endsection
	@section('form')
		{{ Form::open(array('url' => 'customer', 'id' => 'customer-create-form', 'class' => 'create-form')) }}
	@endsection
@elseif( $action == "customer.show" )
	@section('title')
		{{__("Customer")}} {{$customer->id}}
	@endsection
	@section('breadcrumb')
		<li>{{__("Customer")}}</li> / <li>{{$customer->id}}</li>
	@endsection
	@section('form')
		{{ Form::model($customer, array('route' => array('customer.destroy', $customer->id), 'method' => 'DELETE', 'id' => 'customer-show-form', 'class' => 'show-form')) }}
	@endsection
@elseif( $action == "customer.edit" )
	@section('title')
		{{__("Customer")}} {{$customer->id}} {{__("Edit")}}
	@endsection
	@section('breadcrumb')
		<li>{{__("Customer")}}</li> / <li>{{$customer->id}}</li> / <li>{{__("Edit")}}</li>
	@endsection
	@section('form')
		{{ Form::model($customer, array('route' => array('customer.update', $customer->id), 'method' => 'PUT', 'id' => 'customer-edit-form', 'class' => 'edit-form')) }}
	@endsection
@endif


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
		<li class="nav-item">
			<a class="nav-link" id="machines-tab" data-toggle="tab" href="#machines" role="tab" aria-controls="machines" aria-selected="false">Machines</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="intervs-tab" data-toggle="tab" href="#intervs" role="tab" aria-controls="intervs" aria-selected="false">Interventions</a>
		</li>
	</ul>
		
@endsection


@section('mask-content-tab')
	
	<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
		@include('customer._tab-general')			
	</div>
	
	<div class="tab-pane fade" id="sites" role="tabpanel" aria-labelledby="sites-tab">
		@include('customer._tab-sites')	
	</div>
	
	<div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
		@yield('mask-content-tab-contacts')
	</div>
	
	<div class="tab-pane fade" id="machines" role="tabpanel" aria-labelledby="machines-tab">
		@include('customer._tab-machines')	
	</div>
	
	<div class="tab-pane fade" id="intervs" role="tabpanel" aria-labelledby="intervs-tab">
		@include('customer._tab-intervs')	
	</div>
			
@endsection


@section('mask-footer')

@endsection

@push('script')
<script src="/js/customer-mask.js"></script>
@endpush