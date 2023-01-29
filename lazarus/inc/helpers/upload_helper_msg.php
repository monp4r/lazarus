<?php 

  $nom_fich_subido = $messagePic['name'];
  $tipo_fich_img = strtolower(pathinfo($nom_fich_subido, PATHINFO_EXTENSION));

  $dir_subida = "../views/messages/img_messages/";
  $nom_fich_hash = hash('sha256', "msg_pic" . $id . $_SERVER['REQUEST_TIME'] . $messagePic['name']);
  $nom_fich_subido = $dir_subida . $nom_fich_hash . '.' . $tipo_fich_img;

  $uploadOK = 1;

  $controlImagen = getimagesize($messagePic["tmp_name"]);

  if ($controlImagen !== false) {
    $uploadOK = 1;
  } else {
    $uploadOK = 0;
  }
  

  // Comprobar si el fichero ya existe (en el servidor)
  if (file_exists($nom_fich_subido)) {
    $uploadOK = 0;
  }

  // Comprobar el tamaño de la imagen
  if ($messagePic["size"] > 8388608) {
    $uploadOK = 0;
  }

  // Permitir solo ciertos formatos de fichero
  if ($tipo_fich_img != "jpg" && $tipo_fich_img != "png" && $tipo_fich_img != "jpeg" && $tipo_fich_img != "gif") {
    $uploadOK = 0;
  }

  // Comprobar si ha habido algún error
  if ($uploadOK == 0) {
    $_SESSION['img_msg_error'] = "Lo siento, la imagen no se proceso correctamente.";
    // Si todo está bien, tratar de subir el fichero
  } else {
    if (copy($messagePic["tmp_name"], $nom_fich_subido)) {
      $this->col_usrPost_media = $nom_fich_subido;
    } else {
      $_SESSION['img_msg_error'] = "Lo siento, la imagen no se almacenó bien.";
    }
  }


?>