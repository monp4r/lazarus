<?php 

  $nom_fich_subido = $profilePic['name'];
  $tipo_fich_img = strtolower(pathinfo($nom_fich_subido, PATHINFO_EXTENSION));

  $dir_subida = "../views/messages/img_messages/";
  $nom_fich_hash = hash('sha256', "msg_pic" . $id . $_SERVER['REQUEST_TIME'] . $profilePic['name']);
  $nom_fich_subido = $dir_subida . $nom_fich_hash . '.' . $tipo_fich_img;

  $uploadOK = 1;

  $controlImagen = getimagesize($profilePic["tmp_name"]);

  if ($controlImagen !== false) {
    echo "El fichero es una imagen - " . $controlImagen["mime"] . ".";
    $uploadOK = 1;
  } else {
    echo "El fichero no es una imagen.";
    $uploadOK = 0;
  }
  

  // Comprobar si el fichero ya existe (en el servidor)
  if (file_exists($nom_fich_subido)) {
    echo "Lo siento, el fichero ya existe.";
    $uploadOK = 0;
  }

  // Comprobar el tamaño de la imagen
  if ($profilePic["size"] > 8388608) {
    echo "Lo siento, la imagen es muy grande.";
    $uploadOK = 0;
  }

  // Permitir solo ciertos formatos de fichero
  if ($tipo_fich_img != "jpg" && $tipo_fich_img != "png" && $tipo_fich_img != "jpeg" && $tipo_fich_img != "gif") {
    echo "Lo siento, solo se permiten ficheros JPG, JPEG, PNG o GIF.";
    $uploadOK = 0;
  }

  // Comprobar si ha habido algún error
  if ($uploadOK == 0) {
    #echo "Lo siento, tu fichero no se ha subido. Se ha puesto la imagen por def.";
    $_SESSION['img_msg_error'] = "Lo siento, la imagen no se proceso correctamente.";
    // Si todo está bien, tratar de subir el fichero
  } else {
    if (copy($profilePic["tmp_name"], $nom_fich_subido)) {
      #echo "Se ha subido el fichero " . basename($profilePic["name"]);
      echo '<p>' . "Se ha subido el fichero " . $nom_fich_subido . '</p>';
      $this->col_usrPost_media = $nom_fich_subido;
      echo '<p>' . "Se ha subido el fichero " . $this->col_usrPost_media . '</p>';
    } else {
      #echo "Lo siento, ha habido un error al subir tu fichero.";
      $_SESSION['img_msg_error'] = "Lo siento, la imagen no se almacenó bien.";
    }
  }


?>