<?php

$proyecto = new Proyecto();

$proyectos = "";
$titulo = "";

if ($_GET['tipo'] == "t") {

	$proyecto->setTutor($_SESSION['id']);
	$proyectos = $proyecto->consultarProyectosTutor();
	$titulo = "Tutor";
} else if ($_GET['tipo'] == "j") {
	$proyecto->setJurado($_SESSION['id']);
	$proyectos = $proyecto->consultarProyectosJurado();
	$titulo = "Jurado";
} else {
	header("Location: index.php?pid=" . base64_encode("presentacion/profesor/sesionProfesor.php"));
}

include 'presentacion/profesor/cabeceraProfesor.php';

?>

<head>
	<link rel="stylesheet" href="presentacion/estudiante/estilos.css">
</head>

<br>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div style="text-align: center;" class="card-header bg-dark text-white">Consultar Proyectos Como <?php echo $titulo; ?></div>
				<div class="card-body">
					<div id="resultadosEstudiantes">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col">Id</th>
									<th scope="col">Titulo</th>
									<th scope="col">Proyecto</th>
									<th scope="col">Servicios</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($proyectos as $p) {
									echo "<tr id=" . $p->getId() . ">";
									echo "<td>" . $p->getId() . "</td>";
									echo "<td>" . $p->getTitulo() . "</td>";
									echo "<td> <a data-toggle='modal' data-target='#modalProyecto' href='modalProyecto.php?id=" . $p->getId() . "&origen=" . $titulo . "'> <span class='fas fa-file-alt' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Proyecto' ></span> </a> </td>";
									echo "<td>" .
										"<a id='estado" . $p->getId() . "' ><span id='icon" . $p->getId() ."' class='far " . ($p->getEstado()!=3 && $p->getEstado()!=5?"fa-square":"fa-check-square") . "'  data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Revisar' ></span> </a>
              </td>";
									echo "</tr>";
								}
								echo "<tr><td colspan='9'>" . count($proyectos) . " registros encontrados</td></tr>" ?>
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
		$('body').on('show.bs.modal', '.modal', function(e) {
			var link = $(e.relatedTarget);
			$(this).find(".modal-content").load(link.attr("href"));
		});
	</script>

	<script>
		<?php foreach ($proyectos as $p) { ?>
			$(document).on('click', '#estado<?php echo $p->getId(); ?>', function(e) {

				e.preventDefault();

				var elemento = $(this)[0].parentElement.parentElement;
				var id = $(elemento).attr('id');
				let tipo = '<?php echo $_GET['tipo'] ?>';
				console.log("tipoI: " + tipo);
				
				$.ajax({
					type: "POST",
					url: " <?php echo "indexAjax.php?pid=" . base64_encode("presentacion/profesor/actualizarEstado.php") ?> ",
					data: { id, tipo },
					success: function (response) {

						let datos = JSON.parse(response);
						console.log(datos['tipo']);
						$("#icon<?php echo $p->getId(); ?>").removeClass();
						$("#icon<?php echo $p->getId(); ?>").addClass(datos['icon']);
						$("#icon<?php echo $p->getId(); ?>").attr('data-original-title', datos['mensaje']);
						
						Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Estado Actualizado con Exito!!!',
                        showConfirmButton: false,
                        timer: 900	
                    });
					}
				});


			})
		<?php } ?>
	</script>