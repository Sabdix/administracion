@extends('layouts.layout')
@section('content')
	<div class="content">
		<div class="title m-b-md">
			Mapa
		</div>
	</div>
	@section('sideTable1')
		<h2>Ruta</h2>
		<table class="table table-striped">
			<thead class="thead-dark">
				<th>ID</th>
				<th>Edificio</th>
			</thead>
			<tbody>
				<?php $edificios = array("-","A", "CH", "D", "F", "H", "J", "K", "L", "P", "R", "S2", "S3", "T", "U", "Y", "Z", "AC", "AF", "AG", "Plaza del Estudiante"); ?>
				@foreach(explode(",", $ruta) as $n)
					<tr>
						<td>{{ $n }}</td>
						<td>{{ $edificios[$n] }}</td>
					</tr>
				@endforeach	
			</tbody>
		</table><br>
	@endsection
	<br><br>
	@section('map')
			<canvas id="map">
				<p>Contenido no disponible por el momento</p>
			</canvas>
			<span id="ruta" hidden="true">{{ $ruta }}</span>
			<span id="ruta2" hidden="true">{{ $ruta2 }}</span>
		<script src="/js/map.js"></script>
	@endsection

	@section('sideTable2')
		<h2>Ruta Recorrida</h2>
		<table class="table table-striped">
			<thead class="thead-dark">
				<th>ID</th>
				<th>Edificio</th>
			</thead>
			<tbody>
				@foreach(explode(",", $ruta2) as $n)
					<tr>
						<td>{{ $n }}</td>
						<td>{{ $edificios[$n] }}</td>
					</tr>
				@endforeach	
			</tbody>
		</table><br>
	@endsection

	@section('boton')
		<button class="botonAtras" onclick="atrasMapa('{{ $locationBefore }}')">Atrás</button>
	@endsection
@endsection