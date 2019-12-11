<?php

require 'logica/Persona.php';
require 'logica/Administrador.php';
require 'logica/Profesor.php';
require 'logica/Estudiante.php';
require 'logica/Proyecto.php';


if (isset($_GET["pid"])) {

$pid = base64_decode($_GET["pid"]);
include $pid;

}

?>