@extends('layouts.mask')

@section('form')
	@if( $action == "report.create" )
		{{ Form::open(array('url' => 'report', 'id' => 'report-create-form', 'class' => 'create-form')) }}
	@elseif( $action == "report.show" )
		{{ Form::model($report, array('route' => array('report.destroy', $report->id), 'method' => 'DELETE', 'id' => 'report-show-form', 'class' => 'show-form')) }}
	@elseif( $action == "report.edit" )
		{{ Form::model($report, array('route' => array('report.update', $report->id), 'method' => 'PUT', 'id' => 'report-edit-form', 'class' => 'edit-form')) }}
	@endif
@endsection

@section('mask-header')
	@include('report._form-header')
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
			@include('report._tab-general')
	</div>

	<div class="tab-pane fade" id="fluid" role="tabpanel" aria-labelledby="fluid-tab">
		@include('report._tab-fluid')
	</div>

	<div class="tab-pane fade" id="interv" role="tabpanel" aria-labelledby="interv-tab">
		@include('report._tab-interventions')
	</div>

	<div class="tab-pane fade" id="docs" role="tabpanel" aria-labelledby="docs-tab">
		@yield('mask-content-tab-docs')
	</div>

@endsection


@section('mask-footer')

@endsection

@push('script')
<script src="/js/report-mask.js"></script>
@endpush
