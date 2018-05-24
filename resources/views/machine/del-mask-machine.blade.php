@extends('layouts.mask')

@section('form')
	<form method="POST" action="/machine">
		{{ csrf_field() }}
@endsection

@section('mask-header')

	@yield('mask-header-content')

@endsection


@section('mask-tabs')

	<ul class="nav nav-tabs" id="customer-nav-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Générale</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="interv-tab" data-toggle="tab" href="#interv" role="tab" aria-controls="interv" aria-selected="false">Interventions</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="docs-tab" data-toggle="tab" href="#docs" role="tab" aria-controls="docs" aria-selected="false">Documents</a>
		</li>
	</ul>
		
@endsection


@section('mask-content-tab')
	
	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		@include('machine._tab-home')
	</div>
	
	<div class="tab-pane fade" id="interv" role="tabpanel" aria-labelledby="interv-tab">
		@yield('mask-content-tab-interv')
	</div>
	
	<div class="tab-pane fade" id="docs" role="tabpanel" aria-labelledby="docs-tab">
		@yield('mask-content-tab-docs')
	</div>
			
@endsection


@section('mask-footer')

@endsection
