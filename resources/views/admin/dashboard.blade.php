@extends('layouts.master')

@section('title')
     dashboard
@endsection

@section('content')
	@if (Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
	@endif
	<ul>
		@foreach ($authors as $author)
			<li>{{ $author->name }} ( {{ $author->email }})</li>
		@endforeach
	</ul>
@endsection
