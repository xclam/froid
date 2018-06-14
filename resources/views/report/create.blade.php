@extends('layouts.layout')

@push('css')
	<link href="{{ asset('css/report.css') }}" type="text/css" rel="stylesheet">
@endpush

@section('content')

@if($step != 1)<a href="/report/photo?rid={{$report->id}}" class="btn btn-primary">Gérer les photos</a>@endif

<div class="main-mask">
	{{ Form::open(array('url' => 'report/'.$next)) }}

		@if($step != 1)<input type="hidden" name="id" value="{{$report->id}}" />@endif
		
		@if($step == 1)
			@include('report.cri._header')
		@endif
		
		@if($step == 2)
			@include('report.cerfa15497._intervention-type')
		@endif	
		
		@if($step == 3)
			@include('report.cerfa15497._leaking-control')
		@endif
		
		@if($step == 4)
			@include('report.cerfa15497._handling')
		@endif
		
		@if($step == 5)
			@include('report.cri._survey')		

			@include('report.cri._times')	
		
			@include('report.cri._performance')
		@endif			
			
		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
	{{ Form::close() }}
</div>
@endsection

@push('script')
<script src="/js/mask.js"></script>
<script src="/js/report.js"></script>
@endpush