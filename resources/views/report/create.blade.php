@extends('layouts.layout')


@section('content')

	{{ Form::open(array('url' => 'report/'.$next)) }}

		@if($step != 1)<input type="hidden" name="id" value="{{$report->id}}" />@endif
		
		@if($step == 1)
			@include('report.cerfa15497._header')
		@endif
		
		@if($step == 2)
			@include('report.cerfa15497._intervention-type')
		@endif	
		
		@if($step == 3)
			@include('report.cerfa15497._leaking-control')
		@endif
		
		@if($step == 4)
			@include('report.cri._survey')		

			@include('report.cri._performance')
		@endif			
			
		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}

@endsection