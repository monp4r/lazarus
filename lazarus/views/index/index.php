<?php

if (empty($_SESSION['usr_id'])) {
  header("location: ./controllers/UsersController.php?action=login");
} 

define("TITULO_PAGINA", "Inicio / Lazarus");
include_once '../inc/templates/main_templates/main_header.php';
include_once '../inc/templates/main_templates/navbar.php';
?>

<script src="../public/js/image_validation.js"></script>

<link rel="stylesheet" href="../public/css/index_style.css" />

<style>
  @media (width <=768px) {
    .content {
      display: flex;
      justify-content: center;
    }

  }
</style>

<?php

if (isset($_SESSION['img_msg_error'])) {
  echo '<p>' . $_SESSION['img_msg_error'] . '</p>';
  unset($_SESSION['img_msg_error']);
}

if (isset($_SESSION['text_msg_error'])) {
  echo '<p>' . $_SESSION['text_msg_error'] . '</p>';
  unset($_SESSION['text_msg_error']);
}

if (isset($_SESSION['msg_success'])) {
  echo '<div class="alert alert-success shadow-lg">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
               </svg>
              <span>' . $_SESSION['msg_success'] . '</span>
            </div>
          </div>';
  unset($_SESSION['msg_success']);
}



?>


<div class="content mt-10">

  <label for="my-modal-3" class="z-50 btn btn-primary fixed z-90 bottom-10 left-8 flex justify-center items-center shadow-2xl gap-2">
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
  </div>

  <br>

  <script src="../public/js/message_validation.js"></script>

  <div class="md:flex md:justify-center  ">

    <div class="perfil md:w-80 max-w-sm">
      <div class="rounded-box grid flex-shrink-0 place-items-center items-center gap-4 p-4 py-8 shadow-xl bg-info text-info-content">

        <?php
        echo "
        <div class=\"dropdown\">
          <div tabindex=\"0\">
            <div class=\"w-full\">
              <img src=\"" . $_SESSION['usr_profilePic'] . "\" width=\"94\" height=\"94\" alt=\"" . $_SESSION['usr_alias'] . "\" class=\"mask mask-squircle\" />
            </div>
          </div>
        </div>
        <div>
          <div class=\"dropdown w-full\">
            <div tabindex=\"0\">
              <div class=\"text-center\">
                <div class=\"text-lg font-extrabold\">" . $_SESSION['usr_alias'] . "</div>
                <div class=\"text-lg font-lg\">" . $_SESSION['usr_fullName'] . "</div>
                <div class=\"text-info-content/90 font-bold my-3 text-sm\">
                  SEGUIDORES:
                  <br />
                  SIGUIENDO:
                </div>
              </div>
            </div>
          </div>
        </div>
          <button class=\"btn\" onclick=\"location.href='./UsersController.php?action=edit_profile'\">Editar perfil</button>
          
          </div>
          ";



        ?>

      </div>

      <br>

      <div class="mensajes md:ml-10 ">

        <?php


        if ($mensajes > 0) {

          foreach ($mensajes as $list) {

            echo "<div class=\"card lg:card-side shadow-xl max-w-sm bg-info\">
              <div class=\"card-body text-info-content \">
              <div class=\"avatar\">
                <div class=\"w-10 rounded-full\">
                  <img src=\"" . $list->usr_profilePic . "\"/>
                </div>
              </div>
              <h2 class=\"card-title ml-12 -mt-[51px]\"> " . $list->usr_alias . "</h2>
              <h6 class=\"ml-12 -mt-4\">" . $list->usr_fullName . "</h6>";
            echo "<p class=\"break-words\" >" . $list->usrPost_text . " </p>";

            if (isset($list->usrPost_media)) {
              echo "<figure class=\"rounded-xl\"><img src=\"" . $list->usrPost_media . "\" alt=\"Shoes\" class=\"w-full\" /></figure>";
            }

            echo "</div></div>";
            echo "<br>";
          }
        } else {
          echo "<p class=\"center\"> NO EXISTEN PUBLICACIONES </p>";
        }

        ?>

      </div>

    </div>
    <?php include_once '../inc/templates/main_templates/main_footer.php'; ?>