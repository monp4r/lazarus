<?php

define("TITULO_PAGINA", "$usuario / Lazarus");
include_once '../inc/components/alerts.php';
include_once '../inc/components/messages.php';
include_once '../inc/components/profile.php';
include_once '../inc/components/follow.php';
include_once '../inc/templates/main_templates/main_header.php';
include_once '../inc/templates/main_templates/navbar.php';
?>

<!-- Importamos hojas de estilo y scripts -->
<link rel="stylesheet" href="../public/css/profile_style.css">
<link rel="stylesheet" href="../public/css/index_style.css">

<?php

if (isset($_SESSION['contexto_seguimiento'])) {
  echo $_SESSION['contexto_seguimiento'];
  unset($_SESSION['contexto_seguimiento']);
}

?>

<div class="content mt-10">
  <div class="md:flex md:justify-center  ">
    <div class="perfil md:w-80 max-w-sm">
      <div class="rounded-box grid flex-shrink-0 place-items-center items-center gap-4 p-4 py-8 shadow-xl bg-info text-info-content">

        <?php

        if ($datosUsuario !== 'sin_datos') {

          mostrarPerfil(
            $datosUsuario->col_user_profilePic,
            $datosUsuario->col_usr_alias,
            $datosUsuario->col_usr_fullName
          );

          if ($datosUsuario->col_usr_id == $_SESSION['usr_id']) {
            mostrarBotonEditarPerfil();
          } else if (comprobarSeguimiento($_SESSION['usr_id'], $datosUsuario->col_usr_id)) {
            mostrarBotonSeguido();
          } else {
            mostrarBotonSeguir($usuario);
          }

          echo "</div>";
        } else {
          echo "<p class=\"font-semibold\"> EL USUARIO NO EXISTE </p>";
        }

        ?>

      </div>

      <?php listadoMensajes($mensajesUsuario); ?>

    </div>

  </div>

</div>

<?php
include_once '../inc/templates/main_templates/main_footer.php';
?>