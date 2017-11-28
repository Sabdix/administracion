@extends('layouts.tables')
@section('content')
	
	<div class="content">
		<div class="title m-b-md">
			Partidas Terminadas
		</div>
	</div>
	
	@section('table')

		<table class="table table-striped">
			<thead class="thead-dark">
				<th>Usuario</th>
				<th>Recorrido</th>
				<th>Score</th>
				<th>Hora de Inicio</th>
				<th>Hora de Término</th>
				<th>Ver Mapa</th>
			</thead>
			<tbody>
			@foreach($response as $n => $val)
				<tr>
					<td>{{ $val->Usuario }}</td>
					<td>{{ $val->Recorrido }}</td>
					<td>{{ $val->Score }}</td>
					<td>{{ $val->HoraInicio }}</td>
					<td>{{ $val->HoraFin }}</td>
					<td><a href="{{ route('verMapa', ['ruta' => $val->Ruta, 'avance' => $val->Recorrido, 'locationBefore' => 'partidas_terminadas']) }}" class="btn butt">Ver Mapa</a></td>
				</tr>
			@endforeach	
			</tbody>
		</table>
	@endsection
	@section('boton')
		<button class="botonAtras" onclick="atras()">Atrás</button>
	@endsection
@endsection
