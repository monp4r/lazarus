<?php

define("TITULO_PAGINA", "$usuario / Lazarus");
include_once '../inc/components/alerts.php';
include_once '../inc/components/messages.php';
include_once '../inc/components/profile.php';
include_once '../inc/templates/main_templates/main_header.php';
include_once '../inc/templates/main_templates/navbar.php';
?>
<link rel="stylesheet" href="../public/css/profile_style.css">

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

          mostrarPerfil($datosUsuario->col_user_profilePic,
                        $datosUsuario->col_usr_alias,
                        $datosUsuario->col_usr_fullName,
                        0, 0);

          if ($datosUsuario->col_usr_id == $_SESSION['usr_id']) {
            echo "<button class=\"btn\" onclick=\"location.href='./UsersController.php?action=edit_profile'\">
                    Editar perfil
                  </button>";
          } else {
            echo "<div>  
                    <form method=\"POST\" id=\"followForm\" action=\"FollowController.php\" enctype=\"multipart/form-data\" class=\"form\">
                      <input type=\"hidden\" name=\"action\" value=\"follow_user\">
                      <button class=\"btn\" ype=\"submit\" name=\"fUsuarioASeguir\" id=\"fUsuarioASeguir\" value=\"$usuario\" onclick=\"location.href='./UsersController.php?action=edit_profile'\">
                        SEGUIR
                      </button>
                    </form>
                  </div>";
          }

          echo "</div>";

        } else {
          echo "<p> EL USUARIO NO EXISTE </p>";
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