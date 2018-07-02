@extends('layouts.layout')

@push('css')
	<link href="{{ asset('css/report.css') }}" type="text/css" rel="stylesheet">
@endpush

@section('title')
	{{__("Report")}} - {{ $report->number }}
@endsection

@section('breadcrumb')
	<li>{{__("Report")}}</li> / <li>{{$report->id}}</li> / <li>{{__("Edit")}}</li>
@endsection


@section('content')
{{ Form::model($report, array('route' => array('report.update', $report->id), 'method' => 'PUT', 'id' => 'report-edit-form', 'class' => 'edit-form')) }}
<div id="edit-report">
	<div class="report-nav-bar">
		<a href="{{ route('pdfview',['download'=>'pdf','report'=>$report->id]) }}">Download BSD</a>
		@if( $report->is_validate )<a href="{{ url('report/cri/?rid='.$report->id.'&download=pdf') }}">Download CRI</a>@endif
		@if( !$report->is_validate )
			@if( !$report->is_open )<a href="{{ url('report/validate/'.$report->id) }}">Valider</a>@endif
			{{ Form::submit(__('Update'), array('class' => 'btn btn-primary btn-update')) }}
		@endif
		<!--<a href="{{ url('report/pdf/get-fields') }}">Get PDF Fields</a>-->
	</div>

	<div id="report-header" class="card">
	@if( isset( $report->number ) )
		<h1>Report : {{ $report->number }}</h1>
	@endif


		<div class="form-group">
			<label for="customer">Customer</label>
			<select name="customer_id" id="customer" class="form-control input-field"
				data-control_change="init_site_machine" required>
				<option value="">Select a customer</option>
				@foreach( $customers as $key=>$val )
					<option value="{{$key}}" 
						@if( isset( $report->customer ) && $report->customer->id == $key ) selected @endif>
						{{$val}}
					</option>
				@endforeach
			</select>
		</div> 

		<div class="form-group">
			<label for="site">Site</label>
			<select name="site_id" id="site" class="form-control input-field"
				data-control_change="init_machine" required>
				<option value="">Select a site</option>
				@foreach( $sites as $site )
					<option value="{{$site->id}}" 
						@if( isset( $report->site ) && $report->site->id == $site->id ) selected @endif
						data-customer="{{$site->customer_id}}">{{$site->name}}</option>
				@endforeach
			</select>
		</div> 

		<div class="form-group">
			<label for="machine">Machine</label>
			<select name="machine_id" id="machine" class="form-control input-field" required>
				<option value="">Select a machine</option>
				@foreach( $machines as $machine )
					<option value="{{$machine->id}}" 
						@if( isset( $report->machine ) && $report->machine->id == $machine->id ) selected @endif
						data-customer="{{$machine->customer_id}}"
						data-site="{{$machine->site_id}}">{{$machine->name}}</option>
				@endforeach
			</select>
		</div>

	<?php 
	$d = "";
	if( isset( $report->intervention_date ) ) 
		$d = date('Y-m-d', strtotime($report->intervention_date));
	else 
		$d = date('Y-m-d');
	?>
	<div class="form-group">
		<label for="intervention_date">Intervention date</label>
		<input type="date" id="intervention_date" name="intervention_date" class="form-control input-field" 
			value="{{$d}}" required/>
	</div>
	
	<div class="form-group">
		<label for="cerfa">Remplir le cerfa manipulation des fluides</label>
		<label class="switch">
			<input type="checkbox" name="is_cerfa" id="cerfa" @if(isset($report) && $report->is_cerfa) checked @endif/>
			<span class="slider round"></span>
		</label>
		
	</div>

</div>

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
{{Form::close()}}
@endsection

@push('script')
<script src="/js/report.js"></script>
@endpush