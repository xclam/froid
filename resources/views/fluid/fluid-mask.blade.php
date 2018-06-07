@extends('layouts.mask')

@section('form')
	@if( $action == "fluid.create" )
		{{ Form::open(array('url' => 'fluid', 'id' => 'fluid-create-form', 'class' => 'create-form')) }}
	@elseif( $action == "fluid.show" )
		{{ Form::model($fluid, array('route' => array('fluid.destroy', $fluid->id), 'method' => 'DELETE', 'id' => 'fluid-show-form', 'class' => 'show-form')) }}
	@elseif( $action == "fluid.edit" )
		{{ Form::model($fluid, array('route' => array('fluid.update', $fluid->id), 'method' => 'PUT', 'id' => 'fluid-edit-form', 'class' => 'edit-form')) }}
	@endif
@endsection

@section('mask-header')
	@include('fluid._form-header')	
@endsection

@section('mask-footer')

@endsection

@push('script')
<script src="/js/fluid-mask.js"></script>
@endpush