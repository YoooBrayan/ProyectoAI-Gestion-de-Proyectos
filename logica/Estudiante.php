<?php

require_once 'persistencia/Conexion.php';
require 'persistencia/EstudianteDAO.php';

class Estudiante extends Persona
{

    private $proyecto;
    private $conexion;
    private $estudianteDAO;

    function Estudiante($codigo = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $proyecto = "")
    {
        $this->Persona($codigo, $nombre, $apellido, $correo, $clave);
        $this->proyecto = $proyecto;
        $this->conexion = new Conexion();
        $this->estudianteDAO = new EstudianteDAO($codigo, $nombre, $apellido, $correo, $clave, $proyecto);
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
        $this->nombre = $resultado[0];
        $this->apellido = $resultado[1];
        $this->correo = $resultado[2];
        $this->proyecto = $resultado[3];
        $this->conexion->cerrar();
    }

    function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->estudianteDAO->consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Estudiante($registro[0], $registro[1], $registro[2], $registro[3], $registro[4]);
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
        echo $this->estudianteDAO->agregarEstudianteProyecto();
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

    function existeEstudiante()
    {
        $this->conexion->abrir();
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
        $this->proyecto = $proy;
        $this->estudianteDAO->setProyecto($proy);
    }
}
