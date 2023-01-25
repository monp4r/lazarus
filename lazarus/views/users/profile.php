<?php

include_once '../inc/templates/main_templates/main_header.php';

include_once '../inc/templates/main_templates/navbar.php';


?>

<style>
  @import url("https://fonts.cdnfonts.com/css/anurati");
  @import url("https://fonts.cdnfonts.com/css/euclid-circular-a");
  @import url("https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,0,0");

  .content {
    height: calc(100vh - 66px);
    color: #f9f9f9;
    background-color: #111820;
    font-family: "Euclid Circular A", sans-serif;
  }

  .card{
    word-wrap: break-word;

  }
</style>

<div class="content">

  <?php
  include_once '../config/Connection.php';
  $ic = new Connection();

  $sql = "SELECT col_usrPost_id,
                   col_usrPost_user,
                   TU.col_usr_alias AS usr_alias,
                   TU.col_usr_fullName AS usr_fullName,
                   TU.col_user_profilePic AS usr_profilePic,
                   col_usrPost_text,
                   col_usrPost_media,
                   col_usrPost_createdAt
              FROM tab_user_post TUP, tab_user TU
             WHERE TU.col_usr_id = TUP.col_usrPost_user
               AND TUP.col_usrPost_user = (SELECT col_usr_id
                                             FROM tab_user
                                            WHERE col_usr_alias = ?)
          ORDER BY col_usrPost_createdAt DESC";

  $buscar = $ic->db->prepare($sql);

  echo "<p>" . $usuario . " </p>";
  $buscar->bindParam(1, $usuario);
  $buscar->execute();
  $control = $buscar->fetchAll(PDO::FETCH_OBJ);
  $count = $buscar->rowCount();

  echo "<br>";

  if ($count > 0) {

    foreach ($control as $list) {

      echo "<div class=\"card lg:card-side shadow-xl max-w-sm bg-info\">

          <div class=\"card-body text-info-content\">
            <div class=\"avatar\">
    
              <div class=\"w-10 rounded-full\">
                <img src=\"" . $list->usr_profilePic . "\"/>
              </div>
            </div>
            <h2 class=\"card-title ml-12 -mt-[51px]\"> " . $list->usr_alias . "</h2>
            <h6 class=\"ml-12 -mt-4\">" . $list->usr_fullName . "</h6>";
      echo "<p class=\"break-all\" >" . $list->col_usrPost_text . " </p>";
      if (isset($list->col_usrPost_media)) {
        echo "<figure><img src=\"" . $list->col_usrPost_media . "\" alt=\"Shoes\" class=\"w-full\" /></figure>";
      }

      echo "</div></div>";

      echo "<br>";
    }
  } else {
    echo "<li><div class=\"text-base font-semibold\">NO HAY RESULTADOS</div></li>";
  }

  ?>


  <?php
  include_once '../inc/templates/main_templates/main_footer.php';
  ?>