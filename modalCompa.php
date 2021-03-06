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
			<label id="label" style="display: none;">Valido</label>
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
				let datos = JSON.parse(response);
				//console.log(datos['icon']);
				$("#estado").removeClass();
				$("#estado").addClass(datos['icon']);
				$("#estado").attr("style", "color:" + datos['color'] + "; font-size: 2em;");
				let color = "#DE1F1F";
				$("#label").html(datos['mensaje']);
				$("#label").attr("style", "display: block; color:" + datos['color']);
				$("#botonA").attr("style", "display: inline-block;");
				if(datos['mensaje']=="Estudiante valido!"){
					$("#compa").html(datos['id'])
					$("#compa").attr("style", "display: inline; font-size: 132%; color:" + datos['color'])
				}else{
					$("#compa").attr("style", "display: none;")
					$("#botonA").attr("style", "display: none");
				}
			}
		});

	})
</script>