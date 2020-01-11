<?php 

if(isset($_POST['id'])){
    
    $proyecto = new Proyecto($_POST['id']);
    $proyecto->eliminar();
    echo true;

}

?>
