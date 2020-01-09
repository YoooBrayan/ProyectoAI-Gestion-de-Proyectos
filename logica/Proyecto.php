<?php

require_once 'persistencia/Conexion.php';
require_once 'persistencia/ProyectoDAO.php';
require_once 'Profesor.php';

class Proyecto
{

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

    function Proyecto($id = "", $titulo = "", $plantamiento = "", $objetivoGeneral = "", $objetivoEspecifico = "", $solucionTecnologica = "", $documento = "", $tutor = "", $jurado = "", $estado = "", $random = "")
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->plantamiento = $plantamiento;
        $this->objetivoGeneral = $objetivoGeneral;
        $this->objetivoEspecifico = $objetivoEspecifico;
        $this->solucionTecnologica = $solucionTecnologica;
        $this->documento = $documento;
        $this->tutor = new Profesor();
        $this->jurado = new Profesor();
        $this->estado = $estado;
        $this->random = $random;
        $this->conexion = new Conexion();
        $this->proyectoDAO = new ProyectoDAO($id, $titulo, $plantamiento, $objetivoGeneral, $objetivoEspecifico, $solucionTecnologica, $documento, $tutor, $jurado, $estado, $random);
    }

    function crear()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->proyectoDAO->crear());
        $this->conexion->cerrar();
    }

    function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->proyectoDAO->consultar());
        $resultado = $this->conexion->extraer();
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {
            $this->titulo = $resultado[0];
            $this->plantamiento = $resultado[1];
            $this->objetivoGeneral = $resultado[2];
            $this->objetivoEspecifico = $resultado[3];
            $this->solucionTecnologica = $resultado[4];
            $this->estado = $resultado[5];
            $this->tutor = $resultado[6];
            $this->jurado = $resultado[7];
            $this->documento = $resultado[8];
            $this->conexion->cerrar();
            return true;
        }
    }

    function obtenerId()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->proyectoDAO->obtenerId());
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->conexion->cerrar();
    }

    function actualizarTutor()
    {
        $this->conexion->abrir();
        //echo $this->proyectoDAO->actualizarTutor();
        $this->conexion->ejecutar($this->proyectoDAO->actualizarTutor());
        $this->conexion->cerrar();
    }

    function quitarTutor()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->proyectoDAO->quitarTutor());
        $this->conexion->cerrar();
    }

    function actualizarJurado()
    {
        $this->conexion->abrir();
        //echo $this->proyectoDAO->actualizarJurado();
        $this->conexion->ejecutar($this->proyectoDAO->actualizarJurado());
        $this->conexion->cerrar();
    }

    function quitarJurado()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->proyectoDAO->quitarJurado());
        $this->conexion->cerrar();
    }

    function actualizarEstado()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->proyectoDAO->actualizarEstado());
        $this->conexion->cerrar();
    }

    function consultarProyectosTutor()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->proyectoDAO->consultarProyectosTutor());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Proyecto($registro[0], $registro[1], "", "", "", "", "", "", "", $registro[2]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function consultarProyectosJurado()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->proyectoDAO->consultarProyectosJurado());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Proyecto($registro[0], $registro[1], "", "", "", "", "", "", "", $registro[2]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function estado()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->proyectoDAO->estado());
        $resultado = $this->conexion->extraer();
        $this->estado = $resultado[0];
        $this->conexion->cerrar();
    }


    function getId()
    {
        return $this->id;
    }

    function mensaje()
    {
        return "Mensaje";
    }

    function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    function setPlantamiento($plantamiento)
    {
        $this->plantamiento = $plantamiento;
    }

    function setObjGeneral($objGeneral)
    {
        $this->objetivoGeneral = $objGeneral;
    }

    function setObjetivoEspecificos($objetivoEspecifico)
    {
        $this->objetivoEspecifico = $objetivoEspecifico;
    }

    function setSolucionTecnologica($solucionTecnologica)
    {
        $this->solucionTecnologica = $solucionTecnologica;
    }

    function getTitulo()
    {
        return $this->titulo;
    }

    function getPlantamiento()
    {
        return $this->plantamiento;
    }

    function getObjGeneral()
    {
        return $this->objetivoGeneral;
    }

    function getObjEspecificos()
    {
        return $this->objetivoEspecifico;
    }

    function getSolucionTecnologica()
    {
        return $this->solucionTecnologica;
    }

    function setEstado($estado)
    {
        $this->estado = $estado;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function consultarTutores()
    {
        $this->conexion->abrir();
        //echo $this->proyectoDAO->consultarTutores();
        $this->conexion->ejecutar($this->proyectoDAO->consultarTutores());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Profesor($registro[0], $registro[1]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function verificarTutor($tutor)
    {
        $this->conexion->abrir();
        //echo $this->proyectoDAO->verificarTutor($tutor) . "<br>";
        $this->conexion->ejecutar($this->proyectoDAO->verificarTutor($tutor));
        $resultado = $this->conexion->extraer();
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {

            $this->tutor->setId($resultado[0]);
            $this->proyectoDAO->setTutor($resultado[0]);
            $this->tutor->setNombre($resultado[1]);
            $this->conexion->cerrar();
            return true;
        }
    }

    function setTutor($tutor)
    {
        $this->tutor = $tutor;
        $this->proyectoDAO->setTutor($tutor);
    }

    function getTutor()
    {
        return $this->tutor;
    }

    function consultarJurados()
    {
        $this->conexion->abrir();
        //echo "<br>IDParametro" . $this->id . "<br>";
        $this->conexion->ejecutar($this->proyectoDAO->consultarJurados());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Profesor($registro[0], $registro[1]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function verificarJurado($jurado)
    {
        $this->conexion->abrir();
        //echo $this->proyectoDAO->verificarTutor($tutor) . "<br>";
        $this->conexion->ejecutar($this->proyectoDAO->verificarJurado($jurado));
        $resultado = $this->conexion->extraer();
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {

            $this->jurado->setId($resultado[0]);
            $this->proyectoDAO->setJurado($resultado[0]);
            $this->jurado->setNombre($resultado[1]);
            $this->conexion->cerrar();
            return true;
        }
    }

    function getJurado()
    {
        return $this->jurado;
    }

    function setId($id)
    {
        $this->id = $id;
        $this->proyectoDAO->setId($id);
    }

    function getDocumento()
    {
        return $this->documento;
    }

    function setJurado($jurado)
    {
        $this->jurado = $jurado;
        $this->proyectoDAO->setJurado($jurado);
    }

    function autores(){
        $this->conexion->abrir();
        //echo "<br>IDParametro" . $this->id . "<br>";
        $this->conexion->ejecutar($this->proyectoDAO->autores());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = $registro[0];
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
}
