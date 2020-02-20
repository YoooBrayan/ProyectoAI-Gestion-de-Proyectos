<?php
//$administrador = new Administrador($_SESSION['id']);
//$administrador->consultar();

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
								<th scope="col">Documento</th>
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
		echo "<td> <a data-toggle='modal' data-target='#modalProyecto' href='modalProyecto.php?id=". $e->getProyecto()->getId() . "&origen=E'> <span class='fas ". ($e->getProyecto()->getId()!="" ? "fa-file-alt" : "fa-exclamation-triangle") . "' style='color: ". ($e->getProyecto()->getId()!="" ? '#7EEC3B' : '#CE382B') ."' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title= '". ($e->getProyecto()->getId()!="" ? "Ver Proyecto" : "Proyecto No Subido") ."'></span> </a> </td>";
		echo "<td>" . 

		"<a href='modalAsignar.php?idE=" . $e->getId() . "&tipo=tutor' data-toggle='modal' data-target='#modalAsignar' ><span id='iconT". $e->getId() ."' class='fas fa-user-plus' style='color: ". ($e->getProyecto()->getTutor()=="" ? '#CE382B' : '#7EEC3B') ."' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='". ($e->getProyecto()->getTutor()=="" ? 'Asignar Tutor' : 'Tutor Asignado') ."' ></span> </a>
		
		 <a href='modalAsignar.php?idE=" . $e->getId() . "&tipo=jurado' data-toggle='modal' data-target='#modalAsignar'>
		 <span id='iconJ". $e->getId() ."' class='fas fa-user-plus'    style='color: ". ($e->getProyecto()->getJurado()=="" ? '#CE382B' : '#7EEC3B') ."' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='".($e->getProyecto()->getJurado()=="" ? 'Asignar Jurado' : 'Jurado Asignado') ."' ></span>
		  </a>
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

<div class="modal fade" id="modalAsignar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

