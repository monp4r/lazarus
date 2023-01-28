<?php

function listarMensajes($mensajesUsuario){

  if ($mensajesUsuario > 0) {

    foreach ($mensajesUsuario as $mensaje) {

      echo "<div class=\"card lg:card-side shadow-xl max-w-sm bg-info\">
        <div class=\"card-body text-info-content \">
        <div class=\"avatar\">
          <div class=\"w-10 rounded-full\">
            <img src=\"" . $mensaje->usr_profilePic . "\"/>
          </div>
        </div>
        <h2 class=\"card-title ml-12 -mt-[51px]\"> " . $mensaje->usr_alias . "</h2>
        <h6 class=\"ml-12 -mt-4\">" . $mensaje->usr_fullName . "</h6>
        <p class=\"break-words\" >" . $mensaje->usrPost_text . " </p>";

      if (isset($mensaje->usrPost_media)) {
        echo "<figure class=\"rounded-xl\">
                <img src=\"" . $mensaje->usrPost_media . "\" alt=\"Foto Mensaje\" class=\"w-full\" />
              </figure>";
      }

      echo "</div></div>";
      echo "<br>";
    }
  } else {
    echo "<br><p class=\"center\"> NO EXISTEN PUBLICACIONES </p>";
  }
  
}

function listadoMensajes($mensajesUsuario){
  echo "<br><div class=\"mensajes md:ml-10 \">";
  listarMensajes($mensajesUsuario);
  echo "</div>";
}

function enviarMensaje(){

  echo '<label for="my-modal-3" class="z-50 btn btn-primary fixed z-90 bottom-10 left-8 flex justify-center items-center shadow-2xl gap-2">
          <span class="material-symbols-outlined">
            send
          </span>
          Envíar Mensaje
        </label>
        <input type="checkbox" id="my-modal-3" class="modal-toggle" />
        <div class="modal">
          <div class="modal-box relative bg-[#111820]">
            <form method="POST" id="messageForm" action="MessagesController.php" enctype="multipart/form-data" class="form">
              <input type="hidden" name="action" value="post_message">
              <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
              <h3 class="text-lg font-bold mb-10">Enviar Mensaje</h3>
              <textarea type="text" name="fTexto" id="fTexto" form="messageForm" rows="4" class="textarea textarea-primary w-full h-105 bg-[#111820]" placeholder="Escriba su mensaje..." id="my-text"></textarea>
              <div class="preview">
                <p class="py-4" id="text-preview">Imagen</p>
                <img id="fImagen-preview" />
              </div>
              <div class="form-control w-full">
                <br>
                <label class="label">
                  <span class="label-text">Adjunte una imagen a su mensaje (opcional)</span>
                  <span class="label-text-alt">GIF, JPG, JPEG, PNG</span>
                </label>
                <input type="file" name="fImagen" id="fImagen" accept="image/*" onchange="mostrarVistaPreviaImagen(event);" class="file-input file-input-bordered file-input-info w-full bg-[#111820]" />
                <label class="label bg-[#111820]">
                  <span class="label-text-alt error" id="image_error"></span>
                </label>
              </div>
              <div class="modal-action">
                <p style="margin-top:14px;margin-right:20px;" id="result"></p>
                <button class="btn btn-outline btn-info 
                  " type="submit" id="submit_message">ENVÍAR</button>
              </div>
            </form>
          </div>
        </div>';
  
}
