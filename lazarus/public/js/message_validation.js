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
var limit = 150;
result.textContent = 0 + "/" + limit;

myText.addEventListener("input", function() {
  var currentLength = myText.value.length;
  result.textContent = currentLength + "/" + limit;

  if (currentLength > limit) {
    result.style.borderColor = "red";
    result.style.color = "red";
    document.getElementById("submit_message").disabled = true;
  }
});