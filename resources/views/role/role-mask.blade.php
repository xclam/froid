@extends('layouts.mask')

@section('form')
	@if( $action == "role.create" )
		{{ Form::open(array('url' => 'role', 'id' => 'role-create-form', 'class' => 'create-form')) }}
	@elseif( $action == "role.show" )
		{{ Form::model($role, array('route' => array('role.destroy', $role->id), 'method' => 'DELETE', 'id' => 'role-show-form', 'class' => 'show-form')) }}
	@elseif( $action == "role.edit" )
		{{ Form::model($role, array('route' => array('role.update', $role->id), 'method' => 'PUT', 'id' => 'role-edit-form', 'class' => 'edit-form')) }}
	@endif
@endsection

@section('mask-header')
	@include('role._form-header')	
@endsection


@section('mask-tabs')

	<ul class="nav nav-tabs" id="role-nav-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Générale</a>
		</li>
	</ul>
		
@endsection


@section('mask-content-tab')
	
	<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
		@include('role._tab-informations')	
	</div>
	
			
@endsection


@section('mask-footer')

@endsection

@push('script')
<script src="/js/role-mask.js"></script>
@endpush