<?php

$correo = $_POST['correo'];
$clave = $_POST['clave'];

$administrador = new Administrador("", "", "", $correo, $clave);
$estudiante = new Estudiante("","","", $correo, $clave);
$profesor = new Profesor("", "", "", $correo, $clave);
if($administrador -> autenticar()){
    $_SESSION['id'] = $administrador -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionAdministrador.php"));
}else if($profesor -> autenticar()){
    $_SESSION['id'] = $profesor -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/profesor/sesionProfesor.php"));
}else if($estudiante -> autenticar()){
    $_SESSION['id'] = $estudiante -> getId();   
    header("Location: index.php?pid=" . base64_encode("presentacion/estudiante/sesionEstudiante.php"));
}else{
    header("Location: index.php?pid=" . base64_encode("presentacion/inicio.php") . "&di=true");
}


?>