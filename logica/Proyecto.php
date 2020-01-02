<?php

require_once 'persistencia/Conexion.php';
require 'persistencia/ProyectoDAO.php';

class Proyecto{

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
    private $conexion;
    private $proyectoDAO;

    function Proyecto($id="", $titulo="", $plantamiento="", $objetivoGeneral="", $objetivoEspecifico="", $solucionTecnologica="", $documento="", $tutor="", $jurado="", $estado="", $random){
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
        $this -> conexion = new Conexion();
        $this -> proyectoDAO = new ProyectoDAO($id, $titulo, $plantamiento, $objetivoGeneral, $objetivoEspecifico, $solucionTecnologica, $documento, $tutor, $jurado, $estado, $random);
    }

    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proyectoDAO -> crear());
        $this -> conexion -> cerrar();
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proyectoDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this-> titulo = $resultado[0];
        $this-> plantamiento = $resultado[1];
        $this-> objetivoGeneral = $resultado[2];
        $this-> objetivoEspecifico = $resultado[3];
        $this-> solucionTecnologica = $resultado[4];
        $this-> documento = $resultado[5];
        $this-> tutor = $resultado[6];
        $this-> jurado = $resultado[7];
        $this-> estado = $resultado[8];
        $this -> conexion -> cerrar();
    }

    function obtenerId(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proyectoDAO -> obtenerId());
        $resultado = $this -> conexion -> extraer();
        $this-> id = $resultado[0];
        $this -> conexion -> cerrar();
    }

    function actualizarTutor(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proyectoDAO -> actualizarTutor());
        $this -> conexion -> cerrar();
    }

    function actualizarJurado(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proyectoDAO -> actualizarJurado());
        $this -> conexion -> cerrar();
    }

    function actualizarEstado(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proyectoDAO -> actualizarEstado());
        $this -> conexion -> cerrar();
    }

    function consultarProyectosTutor(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proyectoDAO -> consultarProyectosTutor());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Proyecto($resultados[0], $resultados[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }

    function consultarProyectosJurado(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proyectoDAO -> consultarProyectosJurado());
        $resultados = array();
        $i=0;
        while(($registro = $this -> conexion -> extraer()) != null){
            $resultados[$i] = new Proyecto($resultados[0], $resultados[1]);
            $i++;
        }
        $this -> conexion -> cerrar();
        return $resultados;
    }

    function estado(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proyectoDAO -> estado());
        $resultado = $this -> conexion -> extraer();
        $this -> estado = $resultado[0];
        $this -> conexion -> cerrar();
    }


    function getId(){
        return $this -> id;
    }
}

?>