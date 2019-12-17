<?php
$estudiante = new Estudiante($_SESSION['id']);
$estudiante->consultar();

include 'presentacion/estudiante/cabeceraEstudiante.php';

/*$error = -1;
$titulo = "";
$plantamiento = "";
$oGeneral = "";
$oEspecificos = "";
$solucion = "";
$documento = "";
$compa = "";

if (isset($_POST["crear"])) {

    $random = $_SESSION['id'] + rand(1, 100);
    $titulo = $_POST["titulo"];
    $plantamiento = $_POST["plantamiento"];
    $oGeneral = $_POST["oGeneral"];
    $oEspecificos = $_POST["oEspecificos"];
    $solucion = $_POST["solucion"];
    $compa = $_POST["compa"];

    $doc = $_FILES['documento'];

    if ($doc["size"] <= 100000) {

        if (strpos($doc["type"], "pdf")) {

            if (is_file("documentos/" . $doc["name"] . $_SESSION['id'])) {
                unlink("documentos/" . $doc["name"] . $_SESSION['id']);
            }

            $destino = $_SERVER['DOCUMENT_ROOT'] . '/proyectoAI/documentos/';
            move_uploaded_file($doc['tmp_name'], $destino . $doc["name"] . ".pdf");
        }

        $proyecto = new Proyecto("", $titulo, $plantamiento, $oGeneral, $oEspecificos, $solucion, $doc["name"], "", "", "", $random);

        $proyecto->crear();
        $proyecto->obtenerId();

        $estudiante->setProyecto($proyecto->getId());
        $estudiante->agregarEstudianteProyecto();


        $companero = new Estudiante($compa);
        if ($companero->existeEstudiante()) {
            echo "Compa";

            $companero->setProyecto($proyecto);
            $companero->agregarEstudianteProyecto();
        } else {
            $error = 2;
        }
        $error = 1;
        //header("Location: presentacion/estudiante/sesionEstudiante.php?pid=". $error);
        header("Location: index.php?pid=" . base64_encode("presentacion/estudiante/sesionEstudiante.php") . "&mensaje=".$error);
    } else {
        $error = 0;
    }
}*/

?>

<head>
    <script src="presentacion/estudiante/validar.js"></script>
</head>

<br>
<div class="container">
    <div class="row" style="width: 100%; padding: 0px;">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-primary text-white bg-dark" style="text-align: center;">Registro</div>
                <div class="card-body">
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/estudiante/registrarProyecto.php") ?> method="post" enctype="multipart/form-data" id="form">
                        <div class="form-group">
                            <input type="text" name="titulo" class="form-control" placeholder="Titulo" required="required">
                        </div>
                        <div class="form-group">
                            <label style="color: gray;" id="label1">Plantiamiento </label>
                            <label style="color: red; display: none;" id="aviso1"> *Campo Obligatorio </label>
                            <textarea class="editor" name="plantamiento" id="editor1"></textarea>
                        </div>
                        <div class="form-group">
                            <label style="color: gray;" id="label2"> Objetivo General </label>
                            <label style="color: red; display: none;" id="aviso2"> *Campo Obligatorio </label>
                            <textarea class="editor" name="oGeneral" id="editor2" value="<?php echo $plantamiento; ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <label style="color: gray;" id="label3"> Objetivos Especificos </label>
                            <label style="color: red; display: none;" id="aviso3"> *Campo Obligatorio </label>
                            <textarea class="editor" name="oEspecificos" id="editor3"></textarea>
                        </div>
                        <div class="form-group">
                            <label style="color: gray;" id="label4"> Solucion Tecnologica </label>
                            <label style="color: red; display: none;" id="aviso4"> *Campo Obligatorio </label>
                            <textarea class="editor" name="solucion" id="editor4"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input id="doc" accept=".pdf" type="file" name="documento" class="custom-file-input" placeholder="Documento" required="required" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" style="color: gray;" id="archivo">Seleccione Archivo</label>
                                <label style="color: red; display: none;" id="larchivo"> *Campo Obligatorio </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="number" id="compa" name="compa" class="col-4" placeholder="agregar compañero" value="<?php // echo $codigo; 
                                                                                                                                ?>">
                            <label id="nomCompa" style="display: inline;"></label>
                        </div>
                        <button type="submit" id="boton" name="crear" class="btn btn-dark">Crear</button>
                        <a class="btn btn-dark " href="index.php?pid=<?php echo base64_encode('presentacion/estudiante/crearProyecto.php')
                                                                        ?>" role="button">Inicio</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<script type="text/javascript">
    $(document).on('change', 'input[type="file"]', function() {

        // this.files[0].size recupera el tamaño del archivo
        // alert(this.files[0].size);
        console.log(this);
        validarFile(this.files[0]);


    });

    const form = document.getElementById('form');
    var idCompa = "parametro";

    form.addEventListener('submit', (e) => {

        let b = validar('ID');
        let a = validarFile($("#doc")[0].files[0]);
        console.log(a);

        if (b === undefined && a == true) {
            b = true;
        } else if (!b || !a) {
            e.preventDefault();
        }
    })



    $("form").on("click", "#boton", function(e) { //Esto hace lo mismo que lo de arriba
        //console.log($("#doc"));
        //console.log($("#doc")[0].files[0].name);


        var doc = $("#doc").val();
        let idv = $("#compa").val();
        $.ajax({
            url: "<?php echo "indexAjax.php?pid=" . base64_encode("presentacion/estudiante/validarEstudiante.php") ?>",
            type: "POST",
            data: {
                id2: idv
            },
            success: function(response) {


                let datos = JSON.parse(response);

                console.log(datos["valor"]);
                console.log(datos["valor1"]);

                let b = validar(response);
                let a = validarFile($("#doc")[0].files[0]);
                console.log(a);

                if (b === undefined) {
                    b = true;
                } else if (!b || !a) {
                    e.preventDefault();
                }
            }
        })
    })

    $(document).ready(function() {

        $(".editor").summernote({
            //placeholder: 'Hello bootstrap 4',
        });


        $("#compa").keyup(function(e) {
            let id = $("#compa").val();
            console.log($("#compa").val());

            $.ajax({
                url: "<?php echo "index.php?pid=" . base64_encode("presentacion/estudiante/validarEstudiante.php") ?>",
                type: "POST",
                data: {
                    id
                },
                success: function(response) {
                    $("#nomCompa").html(response);
                }
            })
        })


    });
</script>