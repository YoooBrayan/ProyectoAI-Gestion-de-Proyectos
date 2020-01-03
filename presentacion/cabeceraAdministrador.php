<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
?>

<head>
    <link rel="stylesheet" href="presentacion/estilos.css">
</head>

<header>
    <div class="logo">
        <h1 class="logo-text"><span>A</span>I</h1>
    </div>

    <i class="fa fa-bars menu-toggle"></i>

    <ul class="nav">
        <li><a href="index.php?pid=<?php echo base64_encode('presentacion/sesionAdministrador.php') ?>">Home</a></li>
        <li>
            <a href="#">Consultar</a>
            <ul style="left: 0px;">
                <li><a href="index.php?pid=<?php echo base64_encode("presentacion/estudiante/consultarEstudiante.php") ?>">Estudiante</a></li>
                <li><a href="index.php?pid=<?php echo base64_encode("Presentacion/Profesor/consultarProfesor.php") ?>">Profesor</a></li>
            </ul>
        </li>
        <li><a href="#">Registrar</a>
            <ul style="left: 0px;">
                <li><a href="index.php?pid=<?php echo base64_encode("presentacion/registrar.php") . "&tipo=est" ?>">Estudiante</a></li>
                <li><a href="index.php?pid=<?php echo base64_encode("presentacion/registrar.php") . "&tipo=pro" ?>">Profesor</a></li>
            </ul>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-user"></i>
                <?php echo $administrador->getNombre(); ?>
                <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
            </a>
            <ul>
                <li><a href="#"><?php echo $administrador->getId(); ?></a></li>
                <li><a id="info" href="#"><?php echo $administrador->getCorreo(); ?></a></li>
                <li><a class="logout" href="index.php">Cerrar sesion</a></li>
            </ul>
        </li>
    </ul>
</header>


<script>
    $(document).ready(function() {

        $("body").attr("style", "background-image: url(img/fondo1111.jpg); background-size: 100% 100%; background-attachment: fixed;");
        

        if ($('#info').text().length > 17) {
            let nv = $("#info").text().substr(0, 17);
            $("#info").html(nv + "...");
        }

        $('.menu-toggle').on('click', function() {
            $('.nav').toggleClass('showing');
            $('.nav ul').toggleClass('showing');
        })

    })
</script>