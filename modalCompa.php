<?php

session_start();

?>

<div class="modal-header">
	<h5 class="modal-title">Agregar Integrante</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">

	<form>
		<div class="form-group">
			<div class="input-group">
				<input id="idCompa" type="text" name="correo" class="form-control" placeholder="Codigo" required="required">
				<span id="estado" class="" style="font-size: 1.9em; padding: 5px; color: dodgerblue;"></span>
			</div>
		</div>

		<div class="form-group">
			<button id="buscar" type="submit" class="btn btn-primary">Buscar</button>
		</div>

	</form>
</div>

<script>
	$("form").on("click", "#buscar", function(e) {

		e.preventDefault();
		let idC = $("#idCompa").val();

		$.ajax({
			type: "POST",
			url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/estudiante/validarEstudiante.php") ?>",
			data: {
				id2: idC
			},
			success: function(response) {
				$("#estado").removeClass();
				$("#estado").addClass(response);	
			}
		});

	})
</script>