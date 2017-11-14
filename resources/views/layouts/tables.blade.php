@extends('layouts.layout')
@section('tables')

	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			@yield('table')
		</div>
		<div class="col-sm-1"></div>
	</div>

@endsection