<?php

require_once 'logica/Persona.php';
require_once 'logica/Estudiante.php';

    $estudiante = new Estudiante($_GET['idE']);
    //$bool = $estudiante->existeEstudiante();
    if($estudiante->existeProyecto()){
        //echo "<br>idProyecto: " . $estudiante->getProyecto()->getId(). "<br>";
        $tutores = $estudiante->getProyecto()->consultarTutores();
    
    }


?>

<div class="modal-header">
    <h5 class="modal-title">Asignar Tutor</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">

<form>
<div class="form-group">
            <div class="input-group">
                <label style="font-size: 1.2em;">Seleccione Tutor:</label>
                <select class="custom-select" style="margin-left: 5px;" id="idS">
                <?php 
                foreach ($tutores as $t) {
                    ?>
                    <option value="<?php echo $t -> getId() ?>"><?php echo $t -> getNombre();  ?></option>
                <?php } ?>
                </select>
        </div>
        <div class="form-group">
			<button id="buscar" type="submit" class="btn btn-primary">Asignar</button>
		</div>
 
</form>
        
</div>

<script type="text/javascript">

$("form").on("click", "#buscar", function(e) {
    
    e.preventDefault();
    let idT = $("#idS option:selected")[0].value;
    console.log(idT);
    let idE = '<?php echo $_GET['idE']; ?>';

    $.ajax({
        type: "POST",
        url: "<?php echo "index.php?pid=" . base64_encode("presentacion/profesor/validar.php") ?>",
        data: {
            idT, idE
        },
        success: function (response) {
            console.log(response);
            
        }
    });

});

</script>