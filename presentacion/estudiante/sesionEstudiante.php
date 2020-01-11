<?php
include 'presentacion/estudiante/cabeceraEstudiante.php';

$estudiante = new Estudiante($_SESSION['id']);

$b = "";

if (isset($_GET['b'])) {
    $b = $_GET['b'];
}



?>

<div>

    <?php

    if ($estudiante->consultarProyectoEstudiante()) {
        $estudiante->existeProyecto();
        $autores = $estudiante->getProyecto()->autores();

    ?>
        <div id="proyecto">

            <h1 style="margin-left: 47%; margin-top: 10px;"> Proyecto </h1>
            <div class="card border-dark mb-3" style="max-width: 100%; margin: 30px;">
                <div class="card-header">Titulo</div>
                <div class="card-body text-dark">

                    <p class="card-text"><?php echo $estudiante->getProyecto()->getTitulo(); ?></p>
                    <a class='btn btn-primary' role='button' href="modalProyecto.php?id=<?php echo $estudiante->getProyecto()->getId() . "&origen=" . "E"  ?>" data-toggle='modal' data-target='#modalProyecto' style='display: inline;'>Ver</a>
                    <a id='botonE' class='btn btn-danger' role='button' style='display: inline-block;'>Eliminar</a>

                </div>
            </div>
            <div class="card border-dark mb-3" style="max-width: 100%; margin: 30px;">
                <div class="card-header">Autores</div>
                <div id="autores" class="card-body text-dark">
                    <?php

                    if (count($autores) == 1) {
                        echo "<p class='card-text'> " . $autores[0] . " </p>";
                        echo "<a id='botonB' class='btn btn-dark' data-toggle='modal' data-target='#modalCompa' href='modalCompa.php' role='button'>Agregar Estudiante</a>
                    <a id='botonA' class='btn btn-info' role='button' style='display: none;'>Agregar</a>";
                    } else {
                        foreach ($autores as $e) {
                            echo "<p class='card-text'> " . $e . " </p>";
                        }
                    }
                    ?>
                </div>
            </div>

        </div>


    <?php }

    ?>

</div>

<div class="modal fade" id="modalProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>

<script>
    let b = '<?php echo $b; ?>';
    if (b == "true") {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Proyecto Creado con Exito',
            showConfirmButton: false,
            timer: 2000
        })
        let url = window.location.href; //obtiene la url actual.
        let urlc = url.substr(0, url.length - 7); //acorta la url quitandole los 6 ultimos catacteres.
        window.history.replaceState('', '', urlc); //remplaza la url con la url acortada
    } else if (b == "no") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Usted ya tiene un proyecto registrado!',
        })

        let url = window.location.href; //obtiene la url actual.
        let urlc = url.substr(0, url.length - 6); //acorta la url quitandole los 6 ultimos catacteres.
        window.history.replaceState('', '', urlc); //remplaza la url con la url acortada
    }

    $(document.body).on("keydown", this, function(event) {
        if (event.keyCode == 116) {
            event.preventDefault();
        }
    });
</script>

<div class="modal fade" id="modalCompa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
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
    $("#botonA").on("click", function(e) {

        e.preventDefault();
        let idP = '<?php echo $estudiante->getProyecto()->getId(); ?>';
        $.ajax({
            type: "POST",
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/estudiante/agregarIntegrante.php") ?> ",
            data: {
                idP
            },
            success: function(response) {
                let datos = JSON.parse(response);
                if (datos['valor']) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Estudiante agregado con Exito!',
                        showConfirmButton: false,
                        timer: 2000
                    })

                    $("#botonA").remove();
                    $("#botonB").remove();
                    $("#autores").append("<p>" + datos['info'] + "</p>");

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Algo salio mal',
                    })
                }
            }
        });
    })
</script>

<script>
    $("#botonE").on("click", function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                let id = '<?php echo $estudiante->getProyecto()->getId(); ?>';

                $.ajax({
                    type: "POST",
                    url: " <?php echo "indexAjax.php?pid=" . base64_encode("presentacion/estudiante/eliminarProyecto.php")  ?> ",
                    data: {
                        id
                    },
                    success: function(response) {
                        if (response) {
                            $("#proyecto").remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    }
                });

            }
        })
    })
</script>