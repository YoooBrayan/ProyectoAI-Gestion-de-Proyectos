<?php

class ProfesorDAO{

    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $carrera;

    function ProfesorDAO($id="", $nombre="", $apellido="", $correo, $clave, $carrera=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> carrera = $carrera;
    }

    function registrar(){
        return "insert into Profesor(idProfesor, nombre, apellido, correo, clave) values
                ('". $this -> id ."', '". $this -> nombre ."', '". $this -> apellido ."', '". $this -> correo ."', sha1('". $this -> clave ."'))";
    }

    function autenticar(){
        return "select idProfesor from profesor where correo = '". $this -> correo ."' and clave = sha1('". $this -> clave ."')";
    }

    function consultar()
    {
        return "select nombre, apellido, correo from profesor
                where idprofesor = '" . $this->id . "'";
    }

    function consultarTodos(){
        return "select idProfesor, nombre, apellido, correo from profesor";
    }

    function existeCorreo(){
        return "select correo from correos where correo = '" . $this->correo . "'";
    }

    function setId($id){
        $this->id = $id;
    }

    function getId(){
        return $this->id;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }
}
