@extends('layouts.layout')
@section('content')
	<div class="content">
		<div class="title m-b-md">
			Mapa
		</div>
	</div>
	<br><br>
	@section('map')
			<canvas id="map">
				<p>Contenido no disponible por el momento</p>
			</canvas>
		<script src="/js/map.js"></script>
	@endsection
@endsection