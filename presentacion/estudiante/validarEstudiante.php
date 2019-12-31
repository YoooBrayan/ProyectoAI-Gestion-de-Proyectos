<?php 

session_start();

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

    if($valor){
        $_SESSION['idCC'] = $_POST['id2'];
        echo "fas fa-check";
    }else{
        $_SESSION['idCC'] = "";
        echo "fas fa-times";
    }

    /*$json = array(
        'valor' => $valor,
        'valor1' => $compa -> getNombre()
    );

    echo json_encode($json);*/
}



?>

