@extends('layouts.layout')


@section('content')

	{{ Form::open(array('url' => 'report')) }}
	
		@include('report.cerfa15497._header')

		@include('report.cerfa15497._intervention-type')
		
		@include('report.cerfa15497._leaking-control')

		@include('report.cri._survey')		

		@include('report.cri._performance')	
		
		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}

@endsection