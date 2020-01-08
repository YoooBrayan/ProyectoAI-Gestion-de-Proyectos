<?php

if (isset($_POST['id'])) {

	if ($_POST['tipo'] == "t") {
		$Proyecto = new Proyecto($_POST['id'], "", "", "", "", "", "");
		$Proyecto->estado();
		$Proyecto = new Proyecto($_POST['id'], "", "", "", "", "", "", "", "", (($Proyecto->getEstado()) == 2 ? 3 : 2));
		$Proyecto->actualizarEstado();


		$json = array(
			'icon' => ($Proyecto->getEstado()) == 2 ? 'far fa-square' : 'far fa-check-square',
			'mensaje' => ($Proyecto->getEstado()) == 2 ? 'Revisar' : 'Revisado',
			'tipo' => $_POST['tipo']
		);
		echo json_encode($json);
	} else if ($_POST['tipo'] == "j") {
		$Proyecto = new Proyecto($_POST['id'], "", "", "", "", "", "");
		$Proyecto->estado();
		$Proyecto = new Proyecto($_POST['id'], "", "", "", "", "", "", "", "", (($Proyecto->getEstado()) == 4 ? 5 : 4));
		$Proyecto->actualizarEstado();


		$json = array(
			'icon' => ($Proyecto->getEstado()) == 4 ? 'far fa-square' : 'far fa-check-square',
			'mensaje' => ($Proyecto->getEstado()) == 4 ? 'Revisar' : 'Revisado',
			'tipo' => "j"
		);
		echo json_encode($json);
	}
}


/*$Proyecto = new Paciente($_GET['idPaciente'], "", "", "", "", "", $_GET['estado']);
echo "<script>
console.log('EstadoArrived ' ," . $Proyecto -> getEstado() .");
</script>";
$Proyecto->actualizarEstado();

echo "<td  id='estado" . $Proyecto -> getId() . "' ><span class='fas " . ($Proyecto -> getEstado()==0?"fa-times-circle":"fa-check-circle") . "' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='" . ($Proyecto -> getEstado()==0?"Inhabilitado":"Habilitado") . "' ></span>" . "</td>";
*/
