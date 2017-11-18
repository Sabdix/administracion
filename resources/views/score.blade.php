@extends('layouts.tables')
@section('content')

	<div class="content">
		<div class="title m-b-md">
			Score
		</div>
	</div>

	@section('table')
	
		<table class="table table-striped">
			<thead class="thead-dark">
				<th>Usuario</th>
				<th>Score</th>
				<th>Tiempo</th>
			</thead>
			<tbody>
				@foreach($response as $n => $val)
					<tr>
						<td>{{ $val->Usuario }}</td>
						<td>{{ $val->puntaje }}</td>
						<td>{{ $val->Tiempo }}</td>
					</tr>
				@endforeach	
			</tbody>
		</table>
		
	@endsection
	
@endsection