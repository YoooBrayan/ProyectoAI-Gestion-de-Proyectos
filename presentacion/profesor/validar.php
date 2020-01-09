<?php

if (isset($_POST['idT'])) {

    $estudiante = new Estudiante($_POST['idE']);
    if ($estudiante->existeEstudiante()) {
        $estudiante->existeProyecto();
        if ($_POST['tipo'] == "tutor") {
            if ($estudiante->getProyecto()->verificarTutor($_POST['idT'])) {
                $estudiante->getProyecto()->actualizarTutor();
                echo "ActualizadoT";
            }
        } else if ($_POST['tipo'] == "jurado") {
            if ($estudiante->getProyecto()->verificarJurado($_POST['idT'])) {
                $estudiante->getProyecto()->actualizarJurado();
                echo "ActualizadoJ";
            }
        }
    }
} else {

    $estudiante = new Estudiante($_POST['idE']);
    if ($estudiante->existeEstudiante()) {
        $estudiante->existeProyecto();
        if ($_POST['tipo'] == "tutor") {
                $estudiante->getProyecto()->quitarTutor();
                echo "EAT";
        } else if ($_POST['tipo'] == "jurado") {
                $estudiante->getProyecto()->quitarJurado();
                echo "EAJ";
        }
    }
}
