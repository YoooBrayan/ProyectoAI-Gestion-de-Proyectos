<?php 


$proyecto = new Proyecto($_GET['id']);
$bool = $proyecto->consultar();

$file = "";

if($bool){
    $file = $proyecto->getDocumento();
}

?>


<iframe src="documentos/<?php echo $file; ?>" width="100%" height="931px"></iframe>

<script>

document.title = ' <?php echo $file; ?> ';

</script>