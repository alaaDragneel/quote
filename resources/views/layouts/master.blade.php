<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<link rel="stylesheet" href="{{ asset('src/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('src/css/font-awesome.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('src/css/main.css') }}" />
	</head>
	<body>
		<div class="container-fluid">
			@yield('content')
		</div>
	</body>
</html>
