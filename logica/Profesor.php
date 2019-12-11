<?php
require_once 'persistencia/Conexion.php';
require 'persistencia/ProfesorDAO.php';

class Profesor extends Persona{

    private $carrera;
    private $conexion;
    private $profesorDAO;


    function Profesor($id="", $nombre="", $apellido="", $correo="", $clave="", $carrera=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> carrera = $carrera;
        $this -> conexion = new Conexion();
        $this -> profesorDAO = new ProfesorDAO($id, $nombre, $apellido, $correo, $clave, $carrera);
    }

    function autenticar(){
        $this -> conexion -> abrir();
        $this -> profesorDAO -> autenticar();
        $this -> conexion -> ejecutar($this -> profesorDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];
            $this -> conexion -> cerrar();
            return true;
        } else {
            $this -> conexion -> cerrar();
            return false;            
        }
    }

    function registrar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> profesorDAO -> registrar());
        $this -> conexion -> cerrar();
    }

    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> profesorDAO -> consultarTodos());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Profesor($registro[0], $registro[1], $registro[2], $registro[3]);
            $i++;
        }
        $this-> conexion -> cerrar();
        return $resultados;
    }

    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> profesorDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 0){
            $this -> conexion -> cerrar();
            return false;
        } else {
            $this -> conexion -> cerrar();
            return true;            
        }
    }
}

?>