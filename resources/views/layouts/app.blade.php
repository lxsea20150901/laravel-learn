<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name') }} - {{ $_meta_title ?? '' }}</title>
	<meta name="keywords" content="{{ $_meta_keywords ?? '' }}">
	<meta name="description" content="{{ $_meta_description ?? '' }}">

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@yield('head')
</head>
<body>
<div id="app">
	@include('includes.app_header')

	@section('container')
		<main class="container py-4">
			<div class="row">
				<div class="app-aside">
					@section('aside')
						@include('includes.app_aside')
					@show
				</div>
				<div class="col-sm">
					@yield('content')
				</div>
				<div class="app-additional">
					@section('additional')
						@include('includes.app_additional')
					@show
				</div>
			</div>
		</main>
	@show

</div>
</body>

<!-- Scripts -->
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
@yield('foot')
<script src="{{ asset('js/app.js') }}"></script>
</html>
