<?php

$profesor = new Profesor();
$profesores = $profesor -> consultarTodos();

include 'presentacion/cabeceraAdministrador.php';

?>
<head>
    <link rel="stylesheet" href="presentacion/estudiante/estilos.css">
</head>

<br>	
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div style="text-align: center;" class="card-header bg-dark text-white">Consultar Profesor</div>
				<div class="card-body">
					<div id="resultadosProfesores">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
							</tr>
						</thead>
							<tbody>
						<?php
    foreach ($profesores as $p) {
        echo "<tr id=". $p -> getId() .">";
        echo "<td>" . $p->getId() . "</td>";
        echo "<td>" . $p->getNombre() . "</td>";
        echo "<td>" . $p->getApellido() . "</td>";
        echo "<td>" . $p->getCorreo() . "</td>";
        echo "</tr>";
    
    }
    echo "<tr><td colspan='9'>" . count($profesores) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div>
