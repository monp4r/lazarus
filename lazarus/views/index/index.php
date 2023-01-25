<?php include_once '../inc/templates/main_templates/main_header.php'; ?>

<?php include_once '../inc/templates/main_templates/navbar.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>
<script src="../public/js/image_validation.js"></script>

<link rel="stylesheet" href="../public/css/index_style.css" />

<div class="bg-gray-100 content">

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
    echo '<div class="alert alert-success shadow-lg w">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      <span>' . $_SESSION['msg_success'] . '</span>
    </div>
  </div>';
    unset($_SESSION['msg_success']);
  }

  if (isset($_SESSION['contexto_seguimiento'])) {
    echo '<p>' . $_SESSION['contexto_seguimiento'] . '</p>';
    unset($_SESSION['contexto_seguimiento']);
  }

  ?>



  <div class="content bg-[#111820]">

    <label for="my-modal-3" class="btn btn-primary">Enviar Mensaje</label>
    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
      <div class="modal-box relative">


        <form method="POST" id="messageForm" action="MessagesController.php" enctype="multipart/form-data" class="form">
          <input type="hidden" name="action" value="post_message">

          <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
          <h3 class="text-lg font-bold mb-10">Enviar Mensaje</h3>
          <textarea type="text" name="fTexto" id="fTexto" form="messageForm" rows="3" class="textarea textarea-primary w-full h-105" placeholder="Escriba su mensaje..." id="my-text"></textarea>
          <div class="preview">
            <p class="py-4" id="text-preview">Imagen</p>
            <img id="fImagen-preview" />

          </div>

          <div class="form-control w-full">
            <label class="label">
              <span class="label-text">Adjunte una imagen a su mensaje (opcional)</span>
              <span class="label-text-alt">GIF, JPG, JPEG, PNG</span>
            </label>
            <input type="file" name="fImagen" id="fImagen" accept="image/*" onchange="mostrarVistaPreviaImagen(event);" class="file-input file-input-bordered file-input-info w-full" />
            <label class="label">
              <span class="label-text-alt error" id="image_error"></span>

            </label>
          </div>
          <div class="modal-action">
            <p style="margin-top:14px;margin-right:20px;" id="result"></p>
            <button class="btn btn-outline btn-info 
            " type="submit" id="submit_message">ENVÍAR MENSAJE</button>
          </div>









        </form>





      </div>
    </div>
  </div>

  <script src="../public/js/message_validation.js"></script>





  <form method="POST" id="followForm" action="FollowController.php" enctype="multipart/form-data" class="form">
    <input type="hidden" name="action" value="follow_user">
    <h1>SEGUIR A USUARIO MENSAJE</h1>

    <div class="column">
      <div class="input-box">
        <label>Usuario a seguir</label>
        <input type="text" name="fUsuarioASeguir" id="fUsuarioASeguir" placeholder="Introduzca el usuario a seguir" required />
        <span class="material-symbols-outlined">
          account_circle
        </span>
      </div>
    </div>

    <button type="submit">SEGUIR AL USUARIO INTRODUCIDO</button>
  </form>

</div>

<?php include_once '../inc/templates/main_templates/main_footer.php'; ?>