<?php 
require_once 'logica/Persona.php';
require_once 'logica/Estudiante.php';

$estudiante = new Estudiante();
$estudiante->consultarProyectoEstudiante();

?>


<div class="modal-header">
    <h5 class="modal-title">Proyecto<span style="color:brown; margin-left: 410px;">Estado: Creado por estudiante</span></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
</div>
<div class="modal-body">
    <div class="card border-dark mb-3" style="max-width: 100%;">
        <div class="card-header">Titulo</div>
        <div class="card-body text-dark">

            <p class="card-text"><?php echo $estudiante->getProyecto->getTitulo(); ?></p>
        </div>
    </div>
    <div class="card border-dark mb-3" style="max-width: 100%;">
        <div class="card-header">Plantamineto</div>
        <div class="card-body text-dark">

            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
    <div class="card border-dark mb-3" style="max-width: 100%;">
        <div class="card-header">Objetivo General</div>
        <div class="card-body text-dark">

            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
    <div class="card border-dark mb-3" style="max-width: 100%;">
        <div class="card-header">Objetivos Especificos</div>
        <div class="card-body text-dark">

            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
    <div class="card border-dark mb-3" style="max-width: 100%;">
        <div class="card-header">Solucion Tecnologica</div>
        <div class="card-body text-dark">

            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
</div>