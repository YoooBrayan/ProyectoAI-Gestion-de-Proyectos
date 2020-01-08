<?php
include 'presentacion/estudiante/cabeceraEstudiante.php';

$b = "";

if (isset($_GET['b'])) {
    $b = $_GET['b'];
}



?>

<div>
    <h1>Hola Estudiante</h1>
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