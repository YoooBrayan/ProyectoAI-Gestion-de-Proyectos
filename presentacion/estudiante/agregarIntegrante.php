<?php

if (isset($_POST['idP'])) {

    $compa = new Estudiante($_SESSION['idCC']);
    $valor = $compa->existeEstudiante();
    $proy = $compa->validarProyecto();

    if ($valor && !$proy) {
        $compa->setProyecto($_POST['idP']);
        $compa->agregarEstudianteProyecto();
        $compa->consultar();

        $json = array(
            'valor' => true,
            'info' => "Codigo: " . $compa->getId() . " Nombre: " . $compa->getNombre() . " " . $compa->getApellido()
        );
        echo json_encode($json);
    } else {
        $json = array(
            'valor' => false
        );
        echo json_encode($json);
    }
}
