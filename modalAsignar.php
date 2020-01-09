<?php

require_once 'logica/Persona.php';
require_once 'logica/Estudiante.php';

$titulo = "";

$estudiante = new Estudiante($_GET['idE']);
$bool = $estudiante->existeProyecto();
$estudiante->consultar();
//echo $bool;

if ($bool != 0) {
    if ($_GET['tipo'] == "tutor") {
        $titulo = "Tutor";
        $tutores = $estudiante->getProyecto()->consultarTutores();
    } else if ($_GET['tipo'] == "jurado") {
        $titulo = "Jurado";
        $jurados = $estudiante->getProyecto()->consultarJurados();
    }

?>

    <div class="modal-header">
        <h5 class="modal-title">Asignar <?php echo " " . $titulo; ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

        <form>
            <div class="form-group">
                <div class="input-group">
                    <label style="font-size: 1.2em;">Seleccione <?php echo " " . $titulo; ?>:</label>
                    <select class="custom-select" style="margin-left: 5px;" id="idS">
                        <?php
                        if ($_GET['tipo'] == "tutor") {
                            foreach ($tutores as $t) {
                        ?>
                                <option value="<?php echo $t->getId() ?>"><?php echo $t->getNombre();  ?></option>
                            <?php }
                        } else if ($_GET['tipo'] == "jurado") {
                            foreach ($jurados as $j) {
                            ?>
                                <option value="<?php echo $j->getId() ?>"><?php echo $j->getNombre();  ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <br>
                    <button id="buscar" type="submit" class="btn btn-primary" data-dismiss="modal">Asignar</button>
                    <button id="quitar" type="submit" class="btn btn-primary" data-dismiss="modal">Quitar</button>
                </div>


        </form>

    </div>

<?php

}else{
    ?>

    <div class="modal-header">
        <h5 class="modal-title">El estudiante no ha creado Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>

<?php } ?>

<script type="text/javascript">
    $("form").on("click", "#buscar", function(e) {

        e.preventDefault();
        let idT = $("#idS option:selected")[0].value;
        let idE = '<?php echo $_GET['idE']; ?>';
        let tipo = '<?php echo $_GET['tipo']; ?>'

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/profesor/validar.php") ?>",
            data: {
                idT,
                idE,
                tipo
            },
            success: function(response) {
                if (response == "ActualizadoT") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tutor Asignado con Exito',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    $("#iconT" + idE).attr("style", "color: #7EEC3B");
                    $("#iconT" + idE).attr("data-original-title", "Tutor Asignado");

                } else if (response == "ActualizadoJ") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Jurado Asignado con Exito',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    $("#iconJ" + idE).attr("style", "color: #7EEC3B");
                    $("#iconJ" + idE).attr("data-original-title", "Jurado Asignado");

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Algo Salio Mal!!!',
                    })
                }

            }
        });

    });

    $("form").on("click", "#quitar", function(e) {

        e.preventDefault();
        //let idT = $("#idS option:selected")[0].value;
        let idE = '<?php echo $_GET['idE']; ?>';
        let tipo = '<?php echo $_GET['tipo']; ?>'

        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/profesor/validar.php") ?>",
            data: {
                idE,
                tipo
            },
            success: function(response) {
                if (response == "EAT") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'info',
                        title: 'Estado Actualizado',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    $("#iconT" + idE).attr("style", "color: #CE382B");
                    $("#iconT" + idE).attr("data-original-title", "Asignar Tutor");

                } else if (response == "EAJ") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'info',
                        title: 'Estado Actualizado.',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    $("#iconJ" + idE).attr("style", "color: #CE382B");
                    $("#iconJ" + idE).attr("data-original-title", "Asignar Jurado");

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Algo Salio Mal!!!',
                    })
                }

            }
        });

    });
</script>