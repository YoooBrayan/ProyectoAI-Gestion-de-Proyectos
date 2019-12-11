function validar(compa) {

  if(compa != ""){
    //console.log("Entro no null"); 
    //console.log("Valor: "  + compa);  
  }else{
    console.log("Null");
  }
  for (var i = 1; i <= 4; i++) {
    var dato = $($("#editor"+i).summernote("code")).text();
    //console.log(dato);
    //console.log("lenght: " + dato.length)
    if (dato.length < 1 || compa == false) {
      //console.log("Error");
      //$("#label<?php echo $i; ?>").attr("style", "color: #FF0000; padding: 5px;")
      $("#aviso"+i).attr(
        "style",
        "display: inline; color: red;"
      );
      var top = document.getElementById("label"+i).offsetTop;
      window.scrollTo(0, top);

      return false; 
      //alert("Ingrese " + $("#label<?php echo $i; ?>").text());
      //console.log("No hay nada en el  <?php echo $i; ?>");
    }
  
  }
}
