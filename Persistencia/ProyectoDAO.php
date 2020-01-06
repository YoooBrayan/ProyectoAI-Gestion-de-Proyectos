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
        return "select titulo, plantamiento, objetivoGeneral, objetivosEspecificos, solucionTecnologica, descripcion, tutor('". $this-> id ."'), jurado('". $this->id ."'), documento from Proyecto p inner join estudiante e on p.idProyecto = e.proyecto inner join estado es on p.estado = es.idEstado where idproyecto = '". $this->id ."' limit 1;";
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

    function consultarTutores(){
        //echo "<br>Proyecto: " . $this->id . "<br>";
        return "select idProfesor, concat_ws(' ', nombre, apellido) as Nombre from profesor where idProfesor  not in (select consultarTutores('". $this->id ."')) and idProfesor not in (select verificarTutor('". $this->id ."'))";
    }

    function verificarTutor($tutor){
        //echo "<br>Proyecto: " . $this->id . "<br>";
        return "select idProfesor, concat_ws(' ', nombre, apellido) as Nombre from profesor where idProfesor  not in (select consultarTutores('". $this->id ."')) and idProfesor = '" . $tutor ."'";
    }

    function consultarJurados(){
        return "select idProfesor, concat_ws(' ', nombre, apellido) as Nombre from profesor where idProfesor  not in (select consultarJurados('". $this->id ."')) and idProfesor not in (select verificarJurado('". $this->id ."'))";
    }

    function verificarJurado($jurado){
        //echo "<br>Proyecto: " . $this->id . "<br>";
        return "select idProfesor, concat_ws(' ', nombre, apellido) as Nombre from profesor where idProfesor  not in (select consultarJurados('". $this->id ."')) and idProfesor = '" . $jurado ."'";
    }

    function setId($id){
        $this->id = $id;
    }

    function setTutor($tutor){
        $this->tutor = $tutor;
    }

    function setJurado($jurado){
        $this->jurado = $jurado;
    }
}
