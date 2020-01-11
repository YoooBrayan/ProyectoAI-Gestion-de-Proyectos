<?php

class EstudianteDAO
{

    private $codigo;
    private $nombre;
    private $apellidos;
    private $correo;
    private $clave;
    private $proyecto;

    function EstudianteDAO($codigo, $nombre, $apellidos, $correo, $clave)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->clave = $clave;
    }

    function autenticar()
    {
        return "select codigo from estudiante
                where correo = '" . $this->correo . "' and clave = sha1('" . $this->clave . "')";
    }

    function consultar()
    {
        return "select nombre, apellido, correo, proyecto from estudiante
                where codigo = '" . $this->codigo . "'";
    }

    function consultarTodos()
    {
        return "select codigo, nombre, apellido, correo, proyecto, tutor, jurado from estudiante e left join proyecto p on e.proyecto = p.idProyecto order by estado asc";
    }

    function registrar()
    {
        return "insert into estudiante(codigo, nombre, apellido, correo, clave) values
                ('" . $this->codigo . "', '" . $this->nombre . "', '" . $this->apellidos . "', '" . $this->correo . "' , sha1('" . $this->clave . "'))";
    }

    function agregarEstudianteProyecto()
    {

        return "update estudiante set proyecto = '" . $this->proyecto . "' where codigo = '" . $this->codigo . "'";
    }

    function validarProyecto()
    {
        return "select idProyecto from proyecto, estudiante where idProyecto = proyecto and codigo = '" . $this->codigo . "'";
    }

    function existeCorreo()
    {
        return "select correo from correos where correo = '" . $this->correo . "'";
    }

    function existeEstudiante()
    {
        return "select codigo, concat_ws(' ', nombre, apellido) as nombre from estudiante where codigo = '" . $this->codigo . "'";
    }

    function existeProyecto()
    {
        return "select proyecto from estudiante where codigo = '" . $this->codigo . "'";
    }

    function setProyecto($proyecto)
    {
        $this->proyecto = $proyecto;
    }

    function consultarProyectoEstudiante()
    {
        return "select titulo, plantamiento, objetivoGeneral, objetivosEspecificos, solucionTecnologica, descripcion
        from proyecto p inner join estudiante e on e.proyecto = p.idProyecto inner join Estado es on p.estado = es.idEstado where e.codigo = '" . $this->codigo . "'";
    }
}
