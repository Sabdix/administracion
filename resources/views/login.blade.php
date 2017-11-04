<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
	</head>
	<style>
		html, body {
		background-color: #E7ECEF !important;
		color: #E7ECEF;
		font-family: 'Lucida Sans';
		font-weight: 100;
		height: 100vh;
		margin: 0;
		}
		.full-height {
		height: 100vh;
		}
		.flex-center {
		align-items: center;
		display: flex;
		justify-content: center;
		}
		.position-ref {
		position: relative;
		}
		.top-right {
		position: absolute;
		right: 10px;
		top: 18px;
		}
		.content {
		text-align: center;
		}
		.title {
		font-size: 84px;
		}
		.links > a {
		color: #636b6f;
		padding: 0 25px;
		font-size: 12px;
		font-weight: 600;
		letter-spacing: .1rem;
		text-decoration: none;
		text-transform: uppercase;
		}
		.m-b-md {
		margin-bottom: 30px;
		}
		.butt {
		width: 180px;
		font-family: 'Lucida Sans';
		margin-left: 20px;
		margin-right: 20px;
		background: #006989 !important;
		color: #e6e6e6;
		}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<body>
		{{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
		@if(Session::has('mensaje_error'))
			{{ Session::get('mensaje_error') }}
		@endif
		<div class="content">
			<div class="title m-b-md">
				Login
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="{{route('usuariosActivos')}}" method="get">
					<div class="form-group">
						<label for="usuario">Usuario:</label><br>
						<input type="text" class="form-control" name="usuario" id="usuario" required><br>
					</div>
					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input type="password" class="form-control" name="password" id="password" required>
					</div><br>
					<input type="submit" class="btn butt" value="Aceptar">
				</form>
			</div>
		</div>
	</body>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>