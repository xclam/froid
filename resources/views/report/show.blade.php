@extends('layouts.layout')

@push('css')
<link rel="stylesheet" type="text/css" href="/css/report.css">
@endpush

@section('title')
	Report - {{ $report->number }}
@endsection

@section('content')
<div class="report-nav-bar">
	<a href="{{ route('pdfview',['download'=>'pdf','report'=>$report->id]) }}">Download PDF</a>
	<a href="{{ url('report/validate/'.$report->id) }}">Valider</a>
	<a href="{{ url('report/edit/'.$report->id) }}">Modifier</a>
	<a href="{{ url('report/delete/'.$report->id) }}">Delete</a>
	<a href="{{ url('report/pdf/get-fields') }}">Get PDF Fields</a>
</div>

@include('report.cerfa15497._header')

<div id="report-body" class="card">
	<div class="form-group">
		<h2>Nature de l'intervention</h2>
		@include('report.cerfa15497._intervention-type')
	</div> 	
</div>



<?php print_r($report->toArray()); ?>

@endsection