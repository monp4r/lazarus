<?php 

  $nom_fich_subido = $profilePic['name'];
  $tipo_fich_img = strtolower(pathinfo($nom_fich_subido, PATHINFO_EXTENSION));

  $dir_subida = "../views/users/img_users/";
  $nom_fich_hash = hash('sha256', "user_pic" . $alias . $_SERVER['REQUEST_TIME'] . $profilePic['name']);
  $nom_fich_subido = $dir_subida . $nom_fich_hash . '.' . $tipo_fich_img;

  $uploadOK = 1;

  $controlImagen = getimagesize($profilePic["tmp_name"]);

  if ($controlImagen !== false) {
    $uploadOK = 1;
  } else {
    $uploadOK = 0;
  }

  if (file_exists($nom_fich_subido)) {
    $uploadOK = 0;
  }

  // Comprobar el tamaño de la imagen
  if ($profilePic["size"] > 8388608) {
    $uploadOK = 0;
  }

  // Permitir solo ciertos formatos de fichero
  if ($tipo_fich_img != "jpg" && $tipo_fich_img != "png" && $tipo_fich_img != "jpeg" && $tipo_fich_img != "gif") {
    $uploadOK = 0;
  }

  // Comprobar si ha habido algún error
  if($uploadOK == 0) {
    if(isset($_SESSION['usr_profilePic'])){
      $this->col_user_profilePic = $_SESSION['usr_profilePic'];
    }
  } else {
    if(copy($profilePic["tmp_name"], $nom_fich_subido)) {
      $this->col_user_profilePic = $nom_fich_subido;
      $_SESSION['usr_profilePic'] = $nom_fich_subido;
    } 
  }

?>