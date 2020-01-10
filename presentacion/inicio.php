<head>
	<link rel="stylesheet" href="presentacion/estilos.css">
</head>

<br>
<br>

<div class="container">
	<div class="row">
		<div class="col-8">
			<div class="card" id="contenedor">
				<div class="card-header bg-dark text-white" id="contenedor1">Bienvenido</div>
				<div class="card-body">
					<h1>
						<p>Aplicación que permite administrar anteproyectos de grado. Roles:Administrador, Estudiante y Profesor.</p>
					</h1>
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="card">
				<div class="card-header bg-dark text-white">Autenticacion</div>
				<div class="card-body">

					<?php if (isset($_GET['di'])) {
						echo "<div class='alert alert-danger' role='alert'>" . "Datos Incorrectos" . " </div>";
					} ?>

					<form action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&nos=true" method="post">
						<div class="form-group">
							<input type="email" name="correo" class="form-control" placeholder="Correo" required="required">
						</div>
						<div class="form-group">
							<input type="password" name="clave" class="form-control" placeholder="Clave" required="required">
						</div>
						<button type="submit" class="btn btn-dark">Autenticar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>