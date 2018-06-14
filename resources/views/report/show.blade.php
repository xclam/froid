@extends('layouts.layout')

@push('css')
	<link href="{{ asset('css/report.css') }}" type="text/css" rel="stylesheet">
@endpush

@section('title')
	Report - {{ $report->number }}
@endsection

@section('content')
<div id="show-report">
	<div class="report-nav-bar">
		<a href="{{ route('pdfview',['download'=>'pdf','report'=>$report->id]) }}">Download BSD</a>
		@if( $report->is_validate )<a href="{{ url('report/cri/?rid='.$report->id.'&download=pdf') }}">Download CRI</a>@endif
		@if( !$report->is_validate )
			@if( !$report->is_open )<a href="{{ url('report/validate/'.$report->id) }}">Valider</a>@endif
			<a href="{{ url('report/edit/'.$report->id) }}">Modifier</a>
			<a href="{{ url('report/delete/'.$report->id) }}">Delete</a>
		@endif
		<!--<a href="{{ url('report/pdf/get-fields') }}">Get PDF Fields</a>-->
	</div>

	@include('report.cri._header')

	<div id="report-body" class="card">
	
		<ul class="nav nav-tabs" id="report-nav-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Nature de l'intervention</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="leak-tab" data-toggle="tab" href="#leak" role="tab" aria-controls="leak" aria-selected="false">Fuites</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="manip-tab" data-toggle="tab" href="#manip" role="tab" aria-controls="manip" aria-selected="false">Manipulations</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="times-tab" data-toggle="tab" href="#times" role="tab" aria-controls="times" aria-selected="false">Horaires</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="survey-tab" data-toggle="tab" href="#survey" role="tab" aria-controls="survey" aria-selected="false">Questionnaire</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="intervs-tab" data-toggle="tab" href="#intervs" role="tab" aria-controls="intervs" aria-selected="false">Interventions</a>
			</li>
		</ul>
	
		<div class="tab-content" >
			<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
					@include('report.cerfa15497._intervention-type')
			</div>
			<div class="tab-pane fade show" id="leak" role="tabpanel" aria-labelledby="leak-tab">
					@include('report.cerfa15497._leaking-control')
			</div>
			<div class="tab-pane fade show" id="manip" role="tabpanel" aria-labelledby="manip-tab">
					@include('report.cerfa15497._handling')
			</div>
			<div class="tab-pane fade show" id="times" role="tabpanel" aria-labelledby="times-tab">
					@include('report.cri._times')
			</div>
			<div class="tab-pane fade show" id="survey" role="tabpanel" aria-labelledby="survey-tab">
					@include('report.cri._survey')
			</div>
			<div class="tab-pane fade show" id="intervs" role="tabpanel" aria-labelledby="intervs-tab">
					@include('report.cri._performance')
			</div>
		</div>
	
	</div>



	<?php //print_r($report->toArray()); ?>
</div>
@endsection

@push('script')
<script src="/js/report.js"></script>
@endpush