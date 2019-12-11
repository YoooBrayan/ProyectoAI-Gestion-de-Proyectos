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
$compa = "";

if (isset($_POST["crear"])) {

    $random = $_SESSION['id'] + rand(1, 100);
    $titulo = $_POST["titulo"];
    $plantamiento = $_POST["plantamiento"];
    $oGeneral = $_POST["oGeneral"];
    $oEspecificos = $_POST["oEspecificos"];
    $solucion = $_POST["solucion"];
    $compa = $_POST["compa"];

    $doc = $_FILES['documento'];

    if ($doc["size"] <= 100000) {

        if (strpos($doc["type"], "pdf")) {

            if (is_file("documentos/" . $doc["name"] . $_SESSION['id'])) {
                unlink("documentos/" . $doc["name"] . $_SESSION['id']);
            }

            $destino = $_SERVER['DOCUMENT_ROOT'] . '/proyectoAI/documentos/';
            move_uploaded_file($doc['tmp_name'], $destino . $doc["name"] . ".pdf");
        }

        $proyecto = new Proyecto("", $titulo, $plantamiento, $oGeneral, $oEspecificos, $solucion, $doc["name"], "", "", "", $random);

        $proyecto->crear();
        $proyecto->obtenerId();

        $estudiante->setProyecto($proyecto->getId());
        $estudiante->agregarEstudianteProyecto();


        $companero = new Estudiante($compa);
        if ($companero->existeEstudiante()) {
            echo "Compa";

            $companero->setProyecto($proyecto);
            $companero->agregarEstudianteProyecto();
        } else {
            $error = "nose";
        }
        $error = "Nose1";
        //header("Location: presentacion/estudiante/sesionEstudiante.php?pid=". $error);
        //header("Location: index.php?pid=" . base64_encode("presentacion/estudiante/sesionEstudiante.php") . "&mensaje=".$error);
    } else {
        $error = "Nose 2";
    }

    header("Location: index.php?pid=" . base64_encode("presentacion/estudiante/sesionEstudiante.php") . "&mensaje=".$error);
}

?>
