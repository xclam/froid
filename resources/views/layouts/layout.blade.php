<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
	
		<!-- Styles -->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">
		@stack('css')
		
        <title>Froid - @yield('title')</title>
		
		<!-- Fonts -->
		<link rel="dns-prefetch" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
		
	</head>
	<body>
	
		@include('layouts.header')
	
		<div id="content" class="container-fluid">
			<div id="control_panel">
				<ol class="breadcrumb">@yield('breadcrumb')</ol>
				@yield('search')
				@yield('control-nav')
				@yield('cta')
			</div>
			@yield('content')
		</div>
	
		@include('layouts.footer')
		
	</body>
</html>