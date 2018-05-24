@extends('layouts.mask')

@section('mask-header')

	@yield('mask-header-content')

@endsection


	@section('mask-tabs')

		<ul class="nav nav-tabs" id="customer-nav-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Générale</a>
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
		
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			@include('customer.tab-home')			
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
