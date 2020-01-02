<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

$estudiante = new Estudiante();
$estudiantes = $estudiante -> consultarTodos();

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
				<div style="text-align: center;" class="card-header bg-dark text-white">Consultar Estudiante</div>
				<div class="card-body">
					<div id="resultadosEstudiantes">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">Correo</th>
								<th scope="col">Proyecto</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
							<tbody>
						<?php
    foreach ($estudiantes as $e) {
        echo "<tr id=". $e -> getId() .">";
        echo "<td>" . $e->getId() . "</td>";
        echo "<td>" . $e->getNombre() . "</td>";
        echo "<td>" . $e->getApellido() . "</td>";
		echo "<td>" . $e->getCorreo() . "</td>";
		echo "<td> <a data-toggle='modal' data-target='#modalProyecto' href='modalProyecto.php'> <span class='fas fa-file-alt' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Proyecto' ></span> </a> </td>";
		echo "<td id='cambiarEstados'>" . 
		"<a href='modalPaciente.php?idPaciente=" . $e->getId() . "' data-toggle='modal' data-target='#modalPaciente' ><span ' class='fas fa-user-plus' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Asignar Tutor' ></span> </a>
                       <a class='fas fa-user-edit' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=" . $e->getId() . "' data-toggle='tooltip' data-placement='left' title='Asignar Jurado'> </a>
              </td>";
        echo "</tr>";
    
    }
    echo "<tr><td colspan='9'>" . count($estudiantes) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div>

<div class="modal fade" id="modalProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>

<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>

