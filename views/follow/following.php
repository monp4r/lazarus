<?php

define("TITULO_PAGINA", "Seguidos / Lazarus");

include_once '../inc/components/alerts.php';
include_once '../inc/components/messages.php';
include_once '../inc/components/profile.php';
include_once '../inc/components/follow.php';
include_once '../inc/templates/main_templates/main_header.php';
include_once '../inc/templates/main_templates/navbar.php';

?>

<br>

<?php
  if (count($listadoUsuarios) == 0) {
    echo "<h1>No sigues a nadie, puedes buscar a alguien en la página de Comunidad.</h1>";
  }
?>

<div class="content grid place-items-center lg:grid-cols-3">

  <?php

  foreach ($listadoUsuarios as $usuario) {

    echo "<div class=\"w-80\">";
    echo "<div class=\"rounded-box grid place-items-center items-center gap-4 p-4 py-8 shadow-xl bg-info text-info-content\"
    onclick=\"window.location='" . "./UsersController.php?action=profile&fAlias=" . $usuario->usr_alias . "'\"
    >";

    mostrarPerfil(
      $usuario->usr_profilePic,
      $usuario->usr_alias,
      $usuario->usr_fullname
    );

    mostrarBotonSeguido();

    echo "</div>";

    echo "</div>";

    echo "<br>";
  }

  ?>

</div>

</div>

<?php include_once '../inc/templates/main_templates/main_footer.php'; ?>