@extends('layouts.tables')
@section('content')
	<div class="content">
		<div class="title m-b-md">
			Usuarios Activos
		</div>
	</div>
	
	@section('table')

		<table class="table table-striped">
			<thead class="thead-dark">
				<th>Usuario</th>
				<th>Avance</th>
				<th>Score</th>
				<th>Hora de Inicio</th>
				<th>Ver Mapa</th>
			</thead>
			<tbody>
				@foreach($response as $n => $val)
					<tr>
						<td>{{ $val->Usuario }}</td>
						<td>{{ $val->Avance }}</td>
						<td>{{ $val->Score }}</td>
						<td>{{ $val->HoraInicio }}</td>
						<td>
							@if(strcmp("", $val->Avance) !== 0)
								<a href="{{ route('verMapa', ['ruta' => $val->Ruta, 'ruta2' => $val->Avance, 'locationBefore' => "usuarios_activos"]) }}" class="btn butt">Ver Mapa</a>
							@else
								<a href="{{ route('verMapa', ['ruta' => $val->Ruta, 'ruta2' => "0", 'locationBefore' => "usuarios_activos"]) }}" class="btn butt">Ver Mapa</a>
							@endif
						</td>

					</tr>
				@endforeach	
			</tbody>
		</table>
	
	@endsection

	@section('boton')
		<button class="botonAtras" onclick="atras()">Atrás</button>
	@endsection
	
@endsection