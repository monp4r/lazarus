<?php

define("TITULO_PAGINA", "Inicio / Lazarus");
include_once '../inc/components/messages.php';
include_once '../inc/components/alerts.php';
include_once '../inc/components/profile.php';
include_once '../inc/templates/main_templates/main_header.php';
include_once '../inc/templates/main_templates/navbar.php';

?>
<!-- Importamos hojas de estilo y scripts -->
<link rel="stylesheet" href="../public/css/index_style.css">
<script src="../public/js/image_validation.js"></script>
<script src="../public/js/message_validation.js"></script>

<?php

if (isset($_SESSION['img_msg_error'])) {
  alertError($_SESSION['img_msg_error']);
  unset($_SESSION['img_msg_error']);
}

if (isset($_SESSION['text_msg_error'])) {
  alertError($_SESSION['text_msg_error']);
  unset($_SESSION['text_msg_error']);
}

if (isset($_SESSION['msg_success'])) {
  alertsuccess($_SESSION['msg_success']);
  unset($_SESSION['msg_success']);
}

?>


<div class="content mt-10">

  <?php enviarMensaje(); ?>

  <br>

  <div class="md:flex md:justify-center  ">

    <div class="perfil md:w-80 max-w-sm">
      <div class="rounded-box grid flex-shrink-0 place-items-center items-center gap-4 p-4 py-8 shadow-xl bg-info text-info-content">

        <?php

        mostrarPerfil($_SESSION['usr_profilePic'],
                      $_SESSION['usr_alias'],
                      $_SESSION['usr_fullName']);

        echo "<button class=\"btn\" onclick=\"location.href='./UsersController.php?action=edit_profile'\">
                Editar perfil
              </button>
              </div>";
        ?>
      </div>

      <?php listadoMensajes($mensajesUsuario); ?>

    </div>
  </div>
</div>

<?php include_once '../inc/templates/main_templates/main_footer.php'; ?>