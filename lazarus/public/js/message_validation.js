function mostrarVistaPreviaImagen(event) {
  if (event.target.files.length > 0) {
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("fImagen-preview");
    var previewString = document.getElementById("text-preview");
    preview.src = src;
    preview.style.display = "block";
    previewString.style.display = "block";
  }
}

var myText = document.getElementById("fTexto");
var result = document.getElementById("result");
var limiteCaracteres = 150;
result.textContent = 0 + "/" + limiteCaracteres;

myText.addEventListener("input", function() {
  
  var longitudMensaje = myText.value.length;
  result.textContent = longitudMensaje + "/" + limiteCaracteres;

  if (longitudMensaje > limiteCaracteres) {
    document.getElementById("submit_message").disabled = true;
    result.style.borderColor = "#cc0000";
    result.style.color = "#cc0000";
  }else{
    document.getElementById("submit_message").disabled = false;
    result.style.borderColor = "white";
    result.style.color = "white";
  }

});