<?php

session_start();

include_once '../models/User.php';

class UsersController extends User
{

  public function Redirect()
  {
    header("location: ../");
  }

  public function RedirectLogin()
  {
    header("location: UsersController.php?action=login");
  }

  public function RedirectSignup()
  {
    header("location: UsersController.php?action=signup");
  }

  public function MostrarLogin()
  {
    include_once '../views/users/login.php';
  }

  public function MostrarSignup()
  {
    include_once '../views/users/signup.php';
  }

  public function RegistrarUsuario($fullName, $alias, $email, $password, $profilePic)
  {

    $this->col_usr_fullName = $fullName;
    $this->col_usr_alias = $alias;
    $this->col_usr_email = $email;
    $this->col_usr_password = $password;


    // REVISAR Y SIMPLIFICAR CODIGO - SEPARAR DEL CONTROLADOR Y HACER INCLUDE ONCE CON METODOS

    if ($profilePic['name'] == '') {
      $this->col_user_profilePic = "../views/users/img_users/default.jpg";
    } else {

      // SIMPLIFICAR ESTO PARA QUE NO SEA TAN LARGO

      $nom_fich_subido = $profilePic['name'];
      $tipo_fich_img = strtolower(pathinfo($nom_fich_subido, PATHINFO_EXTENSION));

      $dir_subida = "../views/users/img_users/";
      $nom_fich_hash = hash('sha256', "user_pic" . $alias . $_SERVER['REQUEST_TIME'] . $profilePic['name']);
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
      if ($profilePic["size"] > 500000) {
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
        echo "Lo siento, tu fichero no se ha subido. Se ha puesto la imagen por defecto.";
        $this->col_user_profilePic = "../views/users/img_users/default.jpg";
        // Si todo está bien, tratar de subir el fichero
      } else {
        if (copy($profilePic["tmp_name"], $nom_fich_subido)) {
          echo "Se ha subido el fichero " . basename($profilePic["name"]);
          $this->col_user_profilePic = $nom_fich_subido;
        } else {
          echo "Lo siento, ha habido un error subiendo tu fichero.";
          $this->col_user_profilePic = "../views/users/img_users/default.jpg";
        }
      }
    }

    $this->GuardarUsuario();
    # $this->Redirect();

  }

  public function VerificarRegistro($fullName, $alias, $email, $password, $profilePic)
  {

    $this->col_usr_alias = $alias;
    $this->col_usr_email = $email;

    $usuario = $this->ConsultarUsuario($alias, $email);

    if ($usuario !== 'sin_datos') {
      if ($usuario->col_usr_alias == $this->col_usr_alias) {
        $_SESSION['error_alias'] = 'Alias ya registrado.';
      }
      if ($usuario->col_usr_email == $this->col_usr_email)
        $_SESSION['error_email'] = 'Email ya registrado.';
      $this->RedirectSignup();
    } else {
      $this->RegistrarUsuario($fullName, $alias, $email, $password, $profilePic);
    }

  }

  public function IniciarSesion($usuario)
  {
    $_SESSION['usr_id'] = $usuario->col_usr_id;
    $_SESSION['usr_email'] = $usuario->col_usr_email;
    $_SESSION['usr_alias'] = $usuario->col_usr_alias;
    $_SESSION['usr_fullName'] = $usuario->col_usr_fullName;
    $_SESSION['usr_profilePic'] = $usuario->col_user_profilePic;
    $_SESSION['usr_createdAt'] = $usuario->col_usr_createdAt;

    unset($_SESSION['error']);
    $this->Redirect();
  }

  public function VerificarLogin($alias_email, $password)
  {

    $this->aux_usr_alias_email = $alias_email;
    $this->col_usr_password = $password;

    $usuario = $this->ConsultarUsuario($alias_email, $alias_email);

    if ($usuario == 'sin_datos') {
      $_SESSION['error'] = 'Usuario no encontrado';
      $this->RedirectLogin();
    } else {
      if (password_verify($this->col_usr_password, $usuario->col_usr_password)) {
        $this->IniciarSesion($usuario);
      } else {
        $_SESSION['error'] = 'Contraseña incorrecta. Inténtelo de nuevo';
        $this->RedirectLogin();
      }
    }
  }

 

  

}

if (isset($_GET['action']) && $_GET['action'] == 'login') {
  $instancia = new UsersController();
  $instancia->MostrarLogin();
}

if (isset($_GET['action']) && $_GET['action'] == 'signup') {
  $instancia = new UsersController();
  $instancia->MostrarSignup();
}

if (isset($_POST['action']) && $_POST['action'] == 'signup') {
  $instancia = new UsersController();
  $instancia->VerificarRegistro($_POST['fNombre'], $_POST['fAlias'], $_POST['fEmail'], $_POST['fPassword'], $_FILES['fProfileAvatar']);
}

if (isset($_POST['action']) && $_POST['action'] == 'login' && isset($_POST['fAlias_fEmail']) && isset($_POST['fPassword'])) {
  $instancia = new UsersController();
  $instancia->VerificarLogin($_POST['fAlias_fEmail'], $_POST['fPassword']);
}


?>