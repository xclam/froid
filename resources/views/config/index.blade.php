@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
			<h2>Company</h2>
			@if( isset( $company->logo ) )
				<img src="/images/{{$company->logo->image_name}}.{{$company->logo->image_extension}}" />
			@else
				logo
			@endif
			<p>@if( isset($company) )<h3>{{$company->name}}</h3>@endif</p>
			<p>Attestation de capacité :@if( isset($company) ){{$company->certificate}}@endif</p>
			<p>Siret : @if( isset($company) ){{$company->siret}}@endif</p>
			<p>Adresse : @if( isset($company) ){!! $company->address !!}@endif</p>
			<a href="/config/modifycpy">Modify</a>
        </div>
		<div class="col">
			<h2>Users</h2>
			<ul>
				<li><a href="/user/">List all users</a></li>
				<li><a href="/role/">List all roles</a></li>
			</ul>
        </div>
		<div class="col">
			<h2>Technique</h2>
			<ul>
				<li><a href="/fluid/">Fluid</a></li>
				<li>Lang</li>
				<li>Counter</li>
			</ul>
        </div>
    </div>
</div>
@endsection