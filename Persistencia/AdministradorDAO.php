<?php

class AdministradorDAO{

    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;

    function AdministradorDAO($id, $nombre, $apellido, $correo, $clave){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
    }

    function autenticar(){
        return "select idAdministrador from administrador
                where correo = '". $this -> correo ."' and clave = sha1('". $this -> clave ."')";
    }

    function consultar(){
        return "select idAdministrador, nombre, apellidos, correo from administrador
                where idAdministrador = '". $this -> id ."'";
    }
}

?>