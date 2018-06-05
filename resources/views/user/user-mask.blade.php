@extends('layouts.mask')

@section('form')
	@if( $action == "user.create" )
		{{ Form::open(array('url' => 'user', 'id' => 'user-create-form', 'class' => 'create-form')) }}
	@elseif( $action == "user.show" )
		{{ Form::model($user, array('route' => array('user.destroy', $user->id), 'method' => 'DELETE', 'id' => 'user-show-form', 'class' => 'show-form')) }}
	@elseif( $action == "user.edit" )
		{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT', 'id' => 'user-edit-form', 'class' => 'edit-form')) }}
	@endif
@endsection

@section('mask-header')
	@include('user._form-header')	
@endsection


@section('mask-tabs')

	<ul class="nav nav-tabs" id="user-nav-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Générale</a>
		</li>
	</ul>
		
@endsection


@section('mask-content-tab')
	
	<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
		@include('user._tab-informations')	
	</div>
	
			
@endsection


@section('mask-footer')

@endsection

@push('script')
<script src="/js/user-mask.js"></script>
@endpush