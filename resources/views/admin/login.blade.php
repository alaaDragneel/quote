@extends('layouts.master')

@section('title')
     login
@endsection

@section('content')
	@if (count($errors) > 0)
		<div class="alert alert-danger text-center">
			<ul class="list-unstyled">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	@if (Session::has('fail'))
		<div class="alert alert-danger">{{ Session::get('fail') }}</div>
	@endif

<form action="{{ route('admin.login') }}" method="post" style="margin: 5% 35%;">
	<div class="input-group">
		<label for="name">Your name</label>
		<input type="text" class="form-control" name="name" id="name" placeholder="Your Name"/>
	</div>
	<div class="input-group">
		<label for="password">Your password</label>
		<input type="password" class="form-control" name="password" id="password" placeholder="Your password"/>
	</div>
	<button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit Quote</button>
	{{ csrf_field() }}
</form>
@endsection
