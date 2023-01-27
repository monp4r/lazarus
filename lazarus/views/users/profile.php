<?php

if (empty($_SESSION['usr_id'])) {
  header("location: ./controllers/UsersController.php?action=login");
} 

define("TITULO_PAGINA", "$usuario / Lazarus");
include_once '../inc/components/alertas.php';
include_once '../inc/templates/main_templates/main_header.php';
include_once '../inc/templates/main_templates/navbar.php';
?>

<style>
  @media (width <=768px) {
    .content {
      display: flex;
      justify-content: center;
    }

  }
</style>

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

          echo "
        <div class=\"dropdown\">
          <div tabindex=\"0\">
            <div class=\"w-full\">
              <img src=\"$datosUsuario->col_user_profilePic\" width=\"94\" height=\"94\" alt=\"$datosUsuario->col_usr_fullName\" class=\"mask mask-squircle\" />
            </div>
          </div>
        </div>
        <div>
          <div class=\"dropdown w-full\">
            <div tabindex=\"0\">
              <div class=\"text-center\">
                <div class=\"text-lg font-extrabold\">$datosUsuario->col_usr_alias</div>
                <div class=\"text-lg font-lg\">$datosUsuario->col_usr_fullName</div>
                <div class=\"text-info-content/90 font-bold my-3 text-sm\">
                  SEGUIDORES:
                  <br />
                  SIGUIENDO:
                </div>
              </div>
            </div>
          </div>
        </div>";

          if ($datosUsuario->col_usr_id == $_SESSION['usr_id']) {
            echo "
          <button class=\"btn\" onclick=\"location.href='./UsersController.php?action=edit_profile'\">Editar perfil</button>
          
          </div>
          ";
          } else {


            echo "
          <div>
  
            <form method=\"POST\" id=\"followForm\" action=\"FollowController.php\" enctype=\"multipart/form-data\" class=\"form\">
              <input type=\"hidden\" name=\"action\" value=\"follow_user\">

              <button class=\"btn\" ype=\"submit\" name=\"fUsuarioASeguir\" id=\"fUsuarioASeguir\" value=\"$usuario\" onclick=\"location.href='./UsersController.php?action=edit_profile'\">SEGUIR</button>
      
              
             
            </form>
  
          </div>
        </div>";
          }
        } else {
          #echo "<br>";
          echo "<p> EL USUARIO NO EXISTE </p>";
        }

        ?>

      </div>

      <br>

      <div class="mensajes md:ml-10 ">

        <?php


        if ($contextoPerfil > 0) {

          foreach ($contextoPerfil as $list) {

            echo "<div class=\"card lg:card-side shadow-xl max-w-sm bg-info\">
              <div class=\"card-body text-info-content \">
              <div class=\"avatar\">
                <div class=\"w-10 rounded-full\">
                  <img src=\"" . $list->usr_profilePic . "\"/>
                </div>
              </div>
              <h2 class=\"card-title ml-12 -mt-[51px]\"> " . $list->usr_alias . "</h2>
              <h6 class=\"ml-12 -mt-4\">" . $list->usr_fullName . "</h6>";
            echo "<p class=\"break-words\" >" . $list->col_usrPost_text . " </p>";

            if (isset($list->col_usrPost_media)) {
              echo "<figure class=\"rounded-xl\"><img src=\"" . $list->col_usrPost_media . "\" alt=\"Shoes\" class=\"w-full\" /></figure>";
            }

            echo "</div></div>";
            echo "<br>";
          }
        } else {
          echo "<br><p class=\"center\"> NO EXISTEN PUBLICACIONES </p>";
        }

        ?>

      </div>

    </div>

  </div>

</div>

    <?php
    include_once '../inc/templates/main_templates/main_footer.php';
    ?>