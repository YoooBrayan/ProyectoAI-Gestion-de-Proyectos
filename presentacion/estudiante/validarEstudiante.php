<?php 

//session_start();

if(isset($_POST['id'])){
 
    $estudiante = new Estudiante($_POST['id']);
    $estudiante -> existeEstudiante();
    if(empty($estudiante -> getNombre())){
        echo "Codigo No Valido.";
    }else{
        echo $estudiante -> getNombre();
    }

}

if(!empty($_POST['id2'])){
    $compa = new Estudiante($_POST['id2']);
    $valor = $compa -> existeEstudiante();
    $proy = $compa -> validarProyecto();

    if($valor && !$proy && $_POST['id2']!=$_SESSION['id']){
        $_SESSION['idCC'] = $_POST['id2'];
        $json = array(
            'id' => $_SESSION['idCC'],
            'icon' => "fas fa-check",
            'mensaje' => "Estudiante valido!",
            'color' => "#45ADC6"
        );
        echo json_encode($json);
        //echo "fas fa-check";
    }else if($valor && $proy){
        $_SESSION['idCC'] = "";
        $json = array(
            'icon' => "fas fa-exclamation",
            'mensaje' => "Estudiante registrado en otro proyecto!",
            'color' => "#F4883D"
        );
        echo json_encode($json);
        //echo "fas fa-exclamation";
    }else if($_POST['id2']==$_SESSION['id']){
        $_SESSION['idCC'] = "";
        $json = array(
            'icon' => "fas fa-exclamation",
            'mensaje' => "Usted no puede agregarse a usted mismo :/",
            'color' => "#F4883D"
        );
        echo json_encode($json);
        //echo "fas fa-exclamation";
    }else{
        $_SESSION['idCC'] = "";
        $json = array(
            'icon' => "fas fa-times",
            'mensaje' => "Estudiante no encontrado!",
            'color' => "#FE2D18"
        );
        echo json_encode($json);
        //echo "fas fa-times";
    }

    /*$json = array(
        'valor' => $valor,
        'valor1' => $compa -> getNombre()
    );

    echo json_encode($json);*/
}
