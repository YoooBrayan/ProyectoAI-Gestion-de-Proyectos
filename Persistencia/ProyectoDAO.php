<?php

class ProyectoDAO{

    private $id;
    private $titulo;
    private $plantamiento;
    private $objetivoGeneral;
    private $objetivoEspecifico;
    private $solucionTecnologica;
    private $documento;
    private $tutor;
    private $jurado;
    private $estado;
    private $random;

    function ProyectoDAO($id="", $titulo="", $plantamiento="", $objetivoGeneral="", $objetivoEspecifico="", $solucionTecnologica="", $documento="", $tutor="", $jurado="", $estado="", $random=""){
        $this -> id = $id;
        $this -> titulo = $titulo;
        $this -> plantamiento = $plantamiento;
        $this -> objetivoGeneral = $objetivoGeneral;
        $this -> objetivoEspecifico = $objetivoEspecifico;
        $this -> solucionTecnologica = $solucionTecnologica;
        $this -> documento = $documento;
        $this -> tutor = $tutor;
        $this -> jurado = $jurado;
        $this -> estado = $estado;
        $this -> random = $random;
    }

    function crear(){
        return "insert into Proyecto(titulo, plantamiento, objetivoGeneral, objetivosEspecificos, solucionTecnologica, documento, random) values ('". $this -> titulo ."', '". $this -> plantamiento ."', '". $this -> objetivoGeneral ."', '". $this -> objetivoEspecifico ."', '". $this -> solucionTecnologica ."', '". $this -> documento ."', '". $this -> random ."')";
    }

    function consultar(){
        return "select titulo, plantamiento, objetivoGeneral, objetivoEspecifico, solucionTecnologica,            documento, Profesor.Nombre.tutor, Profesor.nombre, estado from Proyecto, profesor
                where idProfesor = tutor and idProfesor = jurado and idProyecto = '". $this ->  id ."'";
    }

    function actualizarTutor(){
        return "update proyecto set tutor = '". $this -> tutor ."' where idProyecto = '". $this -> id ."'";
    }

    function actualizarJurado(){
        return "update proyecto set jurado = '". $this -> jurado ."' where idProyecto = '". $this -> id ."'";
    }

    function actualizarEstado(){
        return "update proyecto set estado = '". $this -> estado ."' where idProyecto = '". $this -> id ."'";
    }    

    function consultarProyectosTutor(){
        return "select idProyecto, titulo from proyecto where tutor = '". $this -> tutor ."'";
    }

    function consultarProyectosJurado(){
        return "select idProyecto, titulo from proyecto where jurado = '". $this -> jurado ."'";
    }

    function estado(){
        return "select descripcion from estado where idEstado = '". $this -> estado ."'";
    }

    function obtenerId(){
        return "select idProyecto from proyecto where random = '". $this -> random ."'";
    }

    function consultarTutores($tutor){
        //echo "<br>Proyecto: " . $this->id . "<br>";
        return "select idProfesor, concat_ws(' ', nombre, apellido) as Nombre from profesor where idProfesor  not in (select consultarTutores('". $this->id ."')) and idProfesor = '". $tutor ."'";
    }

    function consultarJurados(){
        return "select idProfesor, concat_ws(' ', nombre, apellido) as Nombre from profesor where idProfesor  not in (select consultarJurados('". $this->id ."')) and idProfesor = '". $this->jurado ."'";
    }

    function setId($id){
        $this->id = $id;
    }
}

?>