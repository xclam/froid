@extends('layouts.layout')

@section('content')
{{$report->medias}}
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
@endsection