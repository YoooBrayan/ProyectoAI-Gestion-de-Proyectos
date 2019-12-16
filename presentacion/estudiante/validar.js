function validar(compa) {
  if (compa != "") {
    //console.log("Entro no null");
    //console.log("Valor: "  + compa);
  } else {
    console.log("Null");
  }
  for (var i = 1; i <= 4; i++) {
    var dato = $($("#editor" + i).summernote("code")).text();
    //console.log(dato);
    //console.log("lenght: " + dato.length)
    if (dato.length < 1 || compa == false) {
      //console.log("Error");
      //$("#label<?php echo $i; ?>").attr("style", "color: #FF0000; padding: 5px;")
      $("#aviso" + i).attr("style", "display: inline; color: red;");
      var top = document.getElementById("label" + i).offsetTop;
      window.scrollTo(0, top);

      return false;
      //alert("Ingrese " + $("#label<?php echo $i; ?>").text());
      //console.log("No hay nada en el  <?php echo $i; ?>");
    }
  }
}

function validarFile(t) {
  var fileName = t.name;
  var fileSize = t.size;

  $("#archivo").html(fileName);

  var ext = fileName.split(".").pop();

  //console.log("name: " + fileName);
  //console.log("size: " + fileSize);
  if (ext != "pdf") {
    // recuperamos la extensión del archivo
    console.log("extension Invalida");
    $("#larchivo").html("El archivo no tiene la extensión adecuada");
    $("#larchivo").attr("style", "display: inline; color: red;");
    $("#boton").prop("disabled", true);
    return false;
  } else if (fileSize > 25000) {
    console.log("> 25000");
    $("#larchivo").html("El archivo no debe superar los 25000 Bytes");
    $("#larchivo").attr("style", "display: inline; color: red;");
    $("#boton").prop("disabled", true);
    /*  console.log("Mayor");
              console.log("this.value: " + this.value);
              console.log("this.files[0].name: " + this.files[0].name);
              alert('El archivo no debe superar los 3MB');
              console.log("this.files[0].name2: " + this.files[0].name);
              //this.value = null;*/
    //console.log("this.files[0].name3: " + this.files[0].name);
    //this.files[0].name = null;
    return false;
  } else {
    $("#larchivo").attr("style", "display: none; color: red;");
    $("#boton").prop("disabled", false);
    return true;
  }
}
