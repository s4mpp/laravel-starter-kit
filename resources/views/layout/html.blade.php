<!DOCTYPE html>
<html class="h-full" lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>{{ config('app.name') }} @hasSection('title') | @yield('title') @endif</title>

		@vite('resources/css/app.css')
	</head>
	<body class="h-full">
        @yield('body')
        
        @vite('resources/js/app.js')
	</body>
</html>