@extends('layouts.layout')

@section('title')
Customer
@endsection

@section('breadcrumb')
<li>Customer</li>
@endsection

@section('search')
<form class="form-inline my-2 my-lg-0" style="width:50%;">
	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="s">
	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection

@section('control-nav')
<a href="customer/create" class="btn btn-outline-success my-2 my-sm-0">Create</a>
@endsection

@section('content')

{{Html::modelTable(
	$customers, 
	array(
		array(
			'slug' => 'name',
			'label' => 'Name'
		),
		array(
			'slug' => 'website',
			'label' => 'Website'
		)
	)
)}}

@endsection