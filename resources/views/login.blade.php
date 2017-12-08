@extends('layouts.layout')

@section('content')
		<div class="content">
			<div class="title m-b-md">
				Login
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="{{route('checkLogin')}}" method="post">
					  <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label for="usuario">Usuario:</label><br>
						<input type="text" class="form-control" name="usuario" id="usuario" required><br>
					</div>
					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input type="password" class="form-control" name="password" id="password" required>
					</div><br>
					<input type="submit" class="btn butt" value="Aceptar">
					<a href="{{ route('home') }}" class="btn butt">Cancelar</a>
				</form>
				<br><br>
				<span>{{ $error }}</span>
			</div>
			<div class="col-sm-4"></div>
		</div>
@endsection