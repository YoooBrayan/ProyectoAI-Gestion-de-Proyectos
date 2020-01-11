<?php
// require 'logica/Persona.php';
// require 'logica/Paciente.php';

$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

include 'presentacion/cabeceraAdministrador.php';

$tipo = $_GET["tipo"];

$error = -1;
$codigo = "";
$nombre = "";
$apellido = "";
$correo = "";
$clave = "";

if (isset($_POST["registrar"])) {

    //$tipo = $_["tipo"]; Aqui se genera el numero aleatorio 
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    //$compañero = $_POST['compañero']; 

    if($tipo=="est"){
        $estudiante = new Estudiante($codigo, $nombre, $apellido, $correo, $clave);//objeto compañero
        //validar existencia de compañero y si $compañero != null if true entonces crear proyecto
        //new proyecto (.....)
        //proyecto -> crear();
        //proyecto -> obtenerID();
        //relacionar el proyecto con los estudiantes
        
        if(!$estudiante->existeCorreo()) {
            $estudiante -> registrar();
            //aqui se consulta 

            $error = 0;
        } else {
            $error = 1;
        }   
    }else {
        $profesor = new Profesor($codigo, $nombre, $apellido, $correo, $clave);
        if(!$profesor->existeCorreo()) {
            $profesor -> registrar();
            $error = 0;
        } else {
            $error = 1;
        }   
    }
}

$codigo = "";
$nombre = "";
$apellido = "";
$correo = "";
$clave = "";
$cedula = "";
?>


<br>
<div class="container">
    <div class="row" style="width: 100%; padding: 0px;">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white bg-dark" style="text-align: center;">Registro</div>
                <div class="card-body">
                    <?php
                    if ($error == 0) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            Registrado exitosamente.
                        </div>
                    <?php } else if ($error == 1) { ?>
                        <div class="alert alert-danger" role="alert">
                            El correo <?php echo $correo; ?> ya existe
                        </div>
                    <?php } ?>
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/registrar.php") . "&tipo=".$tipo." "?> method="post">
                        <div class="form-group">
                            <input type="number" name="codigo" class="form-control" placeholder="Codigo" required="required" value="<?php echo $codigo; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required="required" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido" class="form-control" placeholder="Apellido" required="required" value="<?php echo $apellido; ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" name="correo" class="form-control" placeholder="Correo" required="required" value="<?php echo $correo; ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" name="clave" class="form-control" placeholder="Clave" required="required">
                        </div>
                        <button type="submit" name="registrar" class="btn btn-dark">Registrar</button>
                        <a class="btn btn-dark " href="index.php?pid=<?php echo base64_encode('presentacion/sesionAdministrador.php') ?>" role="button">Inicio</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>