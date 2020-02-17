<?php

class Conexion{

    private $mysqli;
    private $resultado;

    public function abrir(){
        $this -> mysqli = new mysqli("localhost", "root", "", "proyectoai", 3306);
        $this -> mysqli -> set_charset("utf8");
    }

    public function ejecutar($sentencia){
        $this -> resultado = $this -> mysqli -> query($sentencia) or die("Error: " . mysqli_error($this -> mysqli));
    }

    public function extraer(){
        return $this -> resultado -> fetch_row();
    }

    public function numfilas(){
        if($this -> resultado!=null){
            return $this -> resultado -> num_rows;
        }else{
            return 0;
        }
    }    

    public function sentenciaEjecutada(){
        if($this -> resultado === true){
            return true;
        }else{
            return false;
        }
    }

    public function cerrar(){
        $this -> mysqli -> close();
    }

    public function ultimoId(){
        return $this -> mysqli -> insert_id;
    }
}

?>