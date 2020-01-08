<?php
require_once 'logica/Persona.php';
require_once 'logica/Estudiante.php';

$proyecto = new Proyecto($_GET['id']);
$bool = $proyecto->consultar();


if ($bool) {

?>


    <div class="modal-header">
        <h5 class="modal-title">Proyecto<span style="color:brown; margin-left: 410px;">Estado: <?php echo $proyecto->getEstado(); ?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    <div class="modal-body">
        <div class="card border-dark mb-3" style="max-width: 100%;">
            <div class="card-header">Titulo</div>
            <div class="card-body text-dark">

                <p class="card-text"><?php echo $proyecto->getTitulo(); ?></p>
            </div>
        </div>
        <div class="card border-dark mb-3" style="max-width: 100%;">
            <div class="card-header">Plantamineto</div>
            <div class="card-body text-dark">

                <p class="card-text"><?php echo $proyecto->getPlantamiento(); ?></p>
            </div>
        </div>
        <div class="card border-dark mb-3" style="max-width: 100%;">
            <div class="card-header">Objetivo General</div>
            <div class="card-body text-dark">

                <p class="card-text"><?php echo $proyecto->getObjGeneral(); ?></p>
            </div>
        </div>
        <div class="card border-dark mb-3" style="max-width: 100%;">
            <div class="card-header">Objetivos Especificos</div>
            <div class="card-body text-dark">

                <p class="card-text"><?php echo $proyecto->getObjEspecificos(); ?></p>
            </div>
        </div>
        <div class="card border-dark mb-3" style="max-width: 100%;">
            <div class="card-header">Solucion Tecnologica</div>
            <div class="card-body text-dark">

                <p class="card-text"><?php echo $proyecto->getSolucionTecnologica(); ?></p>
            </div>
        </div>
        <?php if ($_GET['origen'] == "Jurado" || $_GET['origen'] == "E") { ?>
            <div class="card border-dark mb-3" style="max-width: 100%;">
                <div class="card-header">Tutor</div>
                <div class="card-body text-dark">

                    <label> <?php echo $proyecto->getTutor(); ?> </label>
                </div>
            </div>
        <?php } if ($_GET['origen'] == "Tutor" || $_GET['origen'] == "E") { ?>

            <div class="card border-dark mb-3" style="max-width: 100%;">
                <div class="card-header">Jurado</div>
                <div class="card-body text-dark">

                    <label> <?php echo $proyecto->getJurado(); ?> </label>
                </div>
            </div>
        <?php } ?>


        <div class="card border-dark mb-3" style="max-width: 100%;">
            <div class="card-header">Documento</div>
            <div class="card-body text-dark">
                <a href="index.php?pid= <?php echo base64_encode("abrirPdf.php") . "&id=" . $_GET['id']; ?>" ><?php echo $proyecto->getDocumento(); ?></a>

            </div>
        </div>
    </div>

<?php } else {

?>

    <div class="modal-header">
        <h5 class="modal-title">El estudiante no ha creado Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>

<?php } ?>

<!--<script>

    $("#archivo").on("click", function(){
        let view = $("#view");
        PDFObject.embed('documentos/Parcial 1 Apl Int.pdf.pdf', view);
    });

    

</script>-->