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
    console.log(b);
    if (b=="true") {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Proyecto Creado con Exito',
            showConfirmButton: false,
            timer: 2000
        })
    } else if (b=="no") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
        })
    }

    $(document.body).on("keydown", this, function(event) {
        if (event.keyCode == 116) {
            event.preventDefault();
        }
    });
</script>