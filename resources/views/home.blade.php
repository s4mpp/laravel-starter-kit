@extends('layout.html')

@section('body')
	<div class="flex items-center justify-center h-screen ">
		<div class="border bg-gray-50 border-gray-200 text-center space-y-3 rounded-lg p-6 divide-y divide-gray-200">
			<div class="pb-4">
				<h1 class="text-4xl mb-2 text-gray-500 font-bold">{{ config('app.name') }}</h1>
				<h1 class="text-xl text-gray-400">Aplicação pronta!</h1>
			</div>

			<div class="text-sm flex flex-col gap-1">
				<span class="text-gray-400">Laravel {{ app()->version() }}</span>
				<span class="text-gray-400">PHP {{ phpversion() }}</span>
			</div>
		</div>
	</div>
@endsection