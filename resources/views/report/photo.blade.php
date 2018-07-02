@extends('layouts.layout')

@section('content')
<a href="/report/{{$report->id}}">retour</a>
{{ Form::open(array('url' => 'report/camera/add', 'enctype' => 'multipart/form-data')) }}
	<input type="hidden" value="{{$report->id}}" name="rid" />
	<div>
		<label for="camera[0]"><i class="fas fa-camera fa-5x"></i></label>
		<input id="camera[0]" name="camera[0][picture]" type="file" accept="image/*" capture="camera" 
			data-onchange="add_row"/>
		<select name="camera[0][tag]">
			<option value="0">Avant</option>
			<option value="1">Pendant</option>
			<option value="2">Après</option>			
		</select>
	</div>
	{{ Form::submit('Ajouter', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

<div class="row" id="customer-sites">
@foreach($report->medias as $p)
	<div class="col-4 row-eq-height mt-3">
		<div class="card input-field report-media-card field-card" data-id="{{$p->id}}" >
			<div class="card-header">
				<h5 class="card-title">
					@if($p->pivot->status == 0)	Avant 		@endif
					@if($p->pivot->status == 1)	Pendant		@endif
					@if($p->pivot->status == 2)	Après		@endif
				</h5>
				<button type="button" class="close input-field" data-onclick="delete_media" data-id="{{$p->id}}" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="card-body" style="height:300px;background:url(/images/{{$p->image_name}}.{{$p->image_extension}}) 50% 50%;background-size: cover;">

			</div>
		</div>
	</div>
@endforeach
</div>

@endsection