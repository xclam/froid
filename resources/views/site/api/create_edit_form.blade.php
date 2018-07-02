@extends('layouts.modal')

@if( $action == 'customer.site.create' )
	@section('modal-form')
		{{ Form::open(array('url' => 'site/ajaxstore', 'id' => 'site-create-form', 'class' => 'create-form')) }}
	@endsection
@elseif( $action == 'customer.site.edit' )
	@section('modal-form')
		{{ Form::model($site, array('route' => array('site.ajaxupdate', $site->id), 'method' => 'PUT', 'id' => 'site-edit-form', 'class' => 'edit-form')) }}
	@endsection 
@endif

@section('modal-title')
	{{Form::label('name','Site :')}}
	{{Form::text( 'name', ( isset( $site ) ) ? $site->name : '', ['class'=>'input-field'])}}
	@isset($site) {{Form::input( 'hidden', 'id', $site->id )}} @endisset
	@isset($customer_id) {{Form::input( 'hidden', 'customer_id', $customer_id )}} @endisset
@endsection

@section('modal-body')
	<div class="row">
		{{Form::label('siret','Siret :', ['class'=>'col-sm-3'])}}
		<div class="form-group col-sm-9">
			{{Form::text( 'siret', ( isset( $site ) ) ? $site->siret : '', ['class'=>'input-field'])}}
		</div>
	</div>
	
	<div class="row">
		{{Form::label('street','Address :', ['class'=>'col-sm-3'])}}
		<div class="form-group col-sm-9">
			{{Form::text( 'street', ( isset( $site ) ) ? $site->address->street : '', ['class'=>'input-field'])}}
			{{Form::text( 'street_extra', ( isset( $site ) ) ? $site->address->street_extra : '', ['class'=>'input-field'])}}
			{{Form::text( 'post_code', ( isset( $site ) ) ? $site->address->post_code : '', ['class'=>'input-field'])}}
			{{Form::text( 'city', ( isset( $site ) ) ? $site->address->city : '', ['class'=>'input-field'])}}
			{{Form::text( 'country', ( isset( $site ) ) ? $site->address->country : '', ['class'=>'input-field'])}}
		</div>
	</div>
@endsection

@section('modal-action')
create_edit_site_response
@endsection