<?php



?>

<div class="modal-header">
    <h5 class="modal-title">Asignar Tutor</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">

        <div class="form-group">
            <div class="input-group">
                <label style="font-size: 1.2em;">Seleccione Tutor:</label>
                <select class="custom-select" style="margin-left: 5px;">
                <?php 
                foreach ($estudiantes as $e) {
                    ?>
                    <option><?php  ?></option>
                <?php } ?>
                </select>

                <!---<input id="idTutor" type="text" name="correo" class="form-control" placeholder="Codigo" required="required">
                <span id="estado" class="" style="font-size: 1.9em; padding: 5px; color: dodgerblue;"></span>
            </div>
            <label id="label" style="display: none;">Valido</label>-->
        </div>

</div>

<script>
    /*$("#idTutor").keyup(function(e) {
        let idT = $("#idTutor").val();
        let idE = '<?php // echo $_GET['idE']; 
                    ?>'

        $.ajax({
            url: "<?php // echo "indexAjax.php?pid=" . base64_encode("presentacion/profesor/validar.php") 
                    ?>",
            type: "POST",
            data: {
                idT, idE
            },
            success: function(response) {
                $("#label").html(response);
                $("#label").attr("style", "display: inline;");
            }
        })
    })*/


    /*$("form").on("click", "#buscar", function(e) {

        e.preventDefault();
        let idC = $("#idCompa").val();

        $.ajax({
            type: "POST",
            url: "<?php // echo "indexAjax.php?pid=" . base64_encode("presentacion/estudiante/validarEstudiante.php") 
                    ?>",
            data: {
                id2: idC
            },
            success: function(response) {
                let datos = JSON.parse(response);
                //console.log(datos['icon']);
                $("#estado").removeClass();
                $("#estado").addClass(datos['icon']);
                let color = "#DE1F1F";
                $("#label").html(datos['mensaje']);
                $("#label").attr("style", "display: block; color:" + datos['color']);
                if (datos['mensaje'] == "Estudiante valido!") {
                    $("#compa").html(datos['id'])
                    $("#compa").attr("style", "display: inline; font-size: 132%; color:" + datos['color'])
                } else {
                    $("#compa").attr("style", "display: none;")
                }
            }
        });

    })*/
</script>