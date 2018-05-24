@extends('layouts.layout')

@push('css')
<link rel="stylesheet" type="text/css" href="/css/report.css">
@endpush

@section('title')
	Report - {{ $report->id }}
@endsection

@section('content')
<div class="report-nav-bar">
	<a href="{{ route('pdfview',['download'=>'pdf','report'=>$report->id]) }}">Download PDF</a>
</div>

<div id="report-header" class="card">
	<h1>Report : {{ $report->id }}</h1>
	<h2>Customer : <a href="<?= url("/customer/{$customer->id}");?>">{{ $customer->name }}</a></h2>
	<h2>Machine : <a href="<?= url("/machine/{$machine->id}");?>">{{ $machine->name }}</a></h2>
</div>

<?php $intervention_type = explode('-', $report->intervention_type); ?>

<div id="report-body" class="card">
	<div id="report-body-1">
		<h2>Nature de l'intervention</h2>
			<div class="row">
				<div class="col-6">
					<input class="form-check-input" type="checkbox" value="1" name="ndi1" id="ndi1" @if($intervention_type[0] == 1) checked @endif />
					<label for="ndi1">Assemblage de l'equipement</label>
				</div>
				<div class="col-6">
					<input class="form-check-input" type="checkbox" value="1" name="ndi2" id="ndi2" @if($intervention_type[0] == 1) checked @endif />
					<label for="ndi2">Mise en service de l'equipement</label>
				</div>
				<div class="col-6">
					<input class="form-check-input" type="checkbox" value="1" name="ndi3" id="ndi3" @if($intervention_type[0] == 1) checked @endif />
					<label for="ndi3">Modification de equipement</label>
				</div>
				<div class="col-6">
					<input class="form-check-input" type="checkbox" value="1" name="ndi4" id="ndi4" @if($intervention_type[0] == 1) checked @endif />
					<label for="ndi4">Maintenance de equipement</label>
				</div>
				<div class="col-6">
					<input class="form-check-input" type="checkbox" value="1" name="ndi5" id="ndi5" @if($intervention_type[0] == 1) checked @endif />
					<label for="ndi5">Controle d'etancheite periodique</label>
				</div>
				<div class="col-6">
					<input class="form-check-input" type="checkbox" value="1" name="ndi6" id="ndi6" @if($intervention_type[0] == 1) checked @endif />
					<label for="ndi6">Controle d'etancheite non periodique</label>
				</div>
				<div class="col-6">
					<input class="form-check-input" type="checkbox" value="1" name="ndi7" id="ndi7" @if($intervention_type[0] == 1) checked @endif />
					<label for="ndi7">Dementelement</label>
				</div>
				<div class="col-6">
					<input class="form-check-input" type="checkbox" value="1" name="ndi8" id="ndi8" @if($intervention_type[0] == 1) checked @endif />
					<label for="ndi8">Autre (préciser)</label>
				</div>
			</div>
	</div>
</div>



<?php print_r($report->toArray()); ?>

@endsection