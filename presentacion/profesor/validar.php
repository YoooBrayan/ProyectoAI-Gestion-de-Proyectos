<?php 

if(isset($_POST['idT'])){

    $estudiante = new Estudiante($_POST['idE']);
    //$bool = $estudiante->existeEstudiante();
/*    if($estudiante->existeProyecto()){
        //echo "<br>idProyecto: " . $estudiante->getProyecto()->getId(). "<br>";
        $estudiante->getProyecto()->consultarTutores($_POST['idT']);
        echo $estudiante->getProyecto()->getTutor()->getNombre();
    }*/

    echo $estudiante -> getId();

}

?>