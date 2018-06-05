@extends('layouts.mask')

@section('form')
	@if( $action == "machine.create" )
		{{ Form::open(array('url' => 'machine', 'id' => 'machine-create-form', 'class' => 'create-form')) }}
	@elseif( $action == "machine.show" )
		{{ Form::model($machine, array('route' => array('machine.destroy', $machine->id), 'method' => 'DELETE', 'id' => 'machine-show-form', 'class' => 'show-form')) }}
	@elseif( $action == "machine.edit" )
		{{ Form::model($machine, array('route' => array('machine.update', $machine->id), 'method' => 'PUT', 'id' => 'machine-edit-form', 'class' => 'edit-form')) }}
	@endif
@endsection

@section('mask-header')
	@include('machine._form-header')	
@endsection


@section('mask-tabs')

	<ul class="nav nav-tabs" id="customer-nav-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Générale</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="fluid-tab" data-toggle="tab" href="#fluid" role="tab" aria-controls="fluid" aria-selected="false">Fluide</a>
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
	
	<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
			@include('machine._tab-general')
	</div>
	
	<div class="tab-pane fade" id="fluid" role="tabpanel" aria-labelledby="fluid-tab">
		@include('machine._tab-fluid')
	</div>
	
	<div class="tab-pane fade" id="interv" role="tabpanel" aria-labelledby="interv-tab">
		@include('machine._tab-interventions')
	</div>
	
	<div class="tab-pane fade" id="docs" role="tabpanel" aria-labelledby="docs-tab">
		@yield('mask-content-tab-docs')
	</div>
			
@endsection


@section('mask-footer')

@endsection

@push('script')
<script src="/js/machine-mask.js"></script>
@endpush