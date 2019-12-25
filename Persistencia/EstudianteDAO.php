<?php

class EstudianteDAO{

    private $codigo;
    private $nombre;
    private $apellidos;
    private $correo;
    private $clave;
    private $proyecto;

    function EstudianteDAO($codigo, $nombre, $apellidos, $correo, $clave, $proyecto){
        $this -> codigo = $codigo;
        $this -> nombre = $nombre;
        $this -> apellidos = $apellidos;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> proyecto = $proyecto;
    }

    function autenticar(){
        return "select codigo from estudiante
                where correo = '". $this -> correo ."' and clave = sha1('". $this -> clave ."')";
    }

    function consultar(){
        return "select nombre, apellido, correo, proyecto from estudiante
                where codigo = '". $this -> codigo ."'";
    }

    function consultarTodos(){
        return "select codigo, nombre, apellido, correo, proyecto from estudiante";
    }

    function registrar(){
        return "insert into estudiante(codigo, nombre, apellido, correo, clave) values
                ('". $this-> codigo."', '". $this -> nombre."', '". $this-> apellidos ."', '". $this -> correo ."' , '". $this -> clave ."')";
    }

    function agregarEstudianteProyecto(){
        
        return "update estudiante set proyecto = '". $this -> proyecto ."' where codigo = '". $this -> codigo ."'";
    }

    function validarProyecto(){
        return "select idProyecto from proyecto, estudiante where idProyecto = proyecto and codigo = '". $this -> codigo ."'";
    }

    function existeCorreo(){
        return "select codigo from estudiante where correo = '" . $this -> correo ."'";
    }

    function existeEstudiante(){
        return "select codigo, concat_ws(' ', nombre, apellido) as nombre from estudiante where codigo = '" . $this -> codigo ."'";
    }

    function setProyecto($proyecto){
        $this -> proyecto = $proyecto;
    }
}

?>