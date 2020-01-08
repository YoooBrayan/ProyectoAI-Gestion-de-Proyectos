<?php 


$proyecto = new Proyecto($_GET['id']);
$bool = $proyecto->consultar();

$file = "";

if($bool){
    $file = $proyecto->getDocumento();
}

//header('Content-type:application/pdf');
//readfile('documentos/'.$file);

?>


<iframe src="documentos/<?php echo $file; ?>" width="100%" height="563px"></iframe>