<?php

require_once 'persistencia/Conexion.php';
require 'persistencia/EstudianteDAO.php';
require_once 'Proyecto.php';

class Estudiante extends Persona
{

    private $proyecto;
    private $conexion;
    private $estudianteDAO;

    function Estudiante($codigo = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $proyecto = "")
    {
        $this->proyecto = new proyecto();
        $this->Persona($codigo, $nombre, $apellido, $correo, $clave);
        $this->conexion = new Conexion();
        $this->estudianteDAO = new EstudianteDAO($codigo, $nombre, $apellido, $correo, $clave);
    }

    function autenticar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estudianteDAO->autenticar());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->id = $resultado[0];
            $this->conexion->cerrar();
            return true;
        } else {
            $this->conexion->cerrar();
            return false;
        }
    }

    function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estudianteDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->proyecto = new Proyecto();
        $this->nombre = $resultado[0];
        $this->apellido = $resultado[1];
        $this->correo = $resultado[2];      
        $this->proyecto->setId($resultado[3]);
        $this->conexion->cerrar();
    }

    function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estudianteDAO->consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Estudiante($registro[0], $registro[1], $registro[2], $registro[3]);
            $resultados[$i]->getProyecto()->setId($registro[4]);
            $resultados[$i]->getProyecto()->setTutor($registro[5]);
            $resultados[$i]->getProyecto()->setJurado($registro[6]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function registrar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estudianteDAO->registrar());
        $this->conexion->cerrar();
    }

    function agregarEstudianteProyecto()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estudianteDAO->agregarEstudianteProyecto());
        $this->conexion->cerrar();
    }

    function existeCorreo()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estudianteDAO->existeCorreo());
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {
            $this->conexion->cerrar();
            return true;
        }
    }

    function validarProyecto()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estudianteDAO->validarProyecto());
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {
            $this->conexion->cerrar();
            return true;
        }
    }

    function existeEstudiante()
    {
        $this->conexion->abrir();
        //echo "<br> Existe ? " . $this->estudianteDAO->existeEstudiante();
        $this->conexion->ejecutar($this->estudianteDAO->existeEstudiante());
        $resultado = $this->conexion->extraer();
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {
            $this->codigo = $resultado[0];
            $this->nombre = $resultado[1];
            $this->conexion->cerrar();
            return true;
        }
    }

    function setProyecto($proy)
    {
        //echo "<br>" . $proy;
        $this->proyecto = $proy;
        $this->estudianteDAO->setProyecto($proy);
    }

    function consultarProyectoEstudiante()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estudianteDAO->consultarProyectoEstudiante());
        $resultado = $this->conexion->extraer();
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {

            $this->proyecto->setTitulo($resultado[0]);
            $this->proyecto->setPlantamiento($resultado[1]);
            $this->proyecto->setObjGeneral($resultado[2]);
            $this->proyecto->setObjetivoEspecificos($resultado[3]);
            $this->proyecto->setSolucionTecnologica($resultado[4]);
            $this->proyecto->setEstado($resultado[5]);
            $this->conexion->cerrar();
            return true;
        }
    }

    function existeProyecto()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estudianteDAO->existeProyecto());
        $resultado = $this->conexion->extraer();
        //echo "Resultado: " . $resultado[0] . "<br>"; 
        if ($resultado[0] == "") {
          //  echo "0 <br>";
            $this->conexion->cerrar();
            return false;
        } else {

            //echo "siempre 1 <br>";
            $this->proyecto->setId($resultado[0]);
            $this->conexion->cerrar();
            return true;
        }
    }

    function getProyecto()
    {
        return $this->proyecto;
    }
}
