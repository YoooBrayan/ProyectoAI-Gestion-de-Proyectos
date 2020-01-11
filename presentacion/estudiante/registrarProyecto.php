<?php

$estudiante = new Estudiante($_SESSION['id']);
$estudiante->consultar();

//include 'presentacion/estudiante/sesionEstudiante.php';

$error = -1;
$titulo = "";
$plantamiento = "";
$oGeneral = "";
$oEspecificos = "";
$solucion = "";
$documento = "";

if (isset($_POST["crear"]) || isset($_GET["pid"])) {

    $random = date("jnYhis");
    $titulo = $_POST["titulo"];
    $plantamiento = $_POST["plantamiento"];
    $oGeneral = $_POST["oGeneral"];
    $oEspecificos = $_POST["oEspecificos"];
    $solucion = $_POST["solucion"];

    $doc = $_FILES['documento'];
    //echo "Nombre : " . $doc["name"] . "<br>";
    //echo "size : " . $doc["size"] . "<br>";

    if ($doc["size"] <= 700000) {


        if (strpos($doc["type"], "pdf")) {

            if (is_file("documentos/" . $doc["name"] . $_SESSION['id'])) {
                unlink("documentos/" . $doc["name"] . $_SESSION['id']);
            }

            $destino = $_SERVER['DOCUMENT_ROOT'] . '/proyectoAI1/documentos/';
            move_uploaded_file($doc['tmp_name'], $destino . date("jnYhis") . ".pdf");
        }

        $proyecto = new Proyecto("", $titulo, $plantamiento, $oGeneral, $oEspecificos, $solucion, date("jnYhis") . ".pdf", "", "", "", $random);

        $proyecto->crear();
        $proyecto->obtenerId();

        $estudiante->setProyecto($proyecto->getId());
        $estudiante->agregarEstudianteProyecto();

        if ($_SESSION['idCC'] != "") {
            $compa = new Estudiante($_SESSION['idCC']);
            $compa->setProyecto($proyecto->getId());
            $compa->agregarEstudianteProyecto();
            $_SESSION['idCC'] = "";
        } 

        //header("Location: presentacion/estudiante/sesionEstudiante.php");
        header("Location: index.php?pid=" . base64_encode("presentacion/estudiante/sesionEstudiante.php") . "&b=true");
        //header("Location: index.php?pid=" . base64_encode("presentacion/estudiante/sesionEstudiante.php") . "&mensaje=".$error);
    } else {
        echo "Nose 2";
    }
    //header("Location: index.php?pid=" . base64_encode("presentacion/estudiante/sesionEstudiante.php") . "&mensaje=".$error);
}

?>


<script>
    $("body").attr("style", "background-image: url(img/fondo1111.jpg); background-size: 100% 100%; background-attachment: fixed;");

    
    /*Swal.fire({
        title: 'Proyecto Creado',
        text: 'Exitosamente!!!',
        footer: '<a href="<?php // echo "index.php?pid=" . base64_encode("presentacion/estudiante/sesionEstudiante.php") 
                            ?>">Inicio</a>'
    })*/
</script>