<?php

session_start();

include_once '../models/User.php';

include_once '../inc/helpers/input_helper.php';

class UsersController extends User
{

  public function Redirect()
  {
    header("location: IndexController.php?action=index");
  }

  public function RedirectLogin()
  {
    header("location: UsersController.php?action=login");
  }

  public function RedirectSignup()
  {
    header("location: UsersController.php?action=signup");
  }

  public function RedirectGestionarPerfil()
  {
    header("location: UsersController.php?action=edit_profile");
  }

  public function MostrarLogin()
  {
    include_once '../views/users/login.php';
  }

  public function MostrarSignup()
  {
    include_once '../views/users/signup.php';
  }

  public function MostrarGestionarPerfil()
  {
    include_once '../views/users/edit_profile.php';
  }

  public function RegistrarUsuario($fullName, $alias, $email, $password, $profilePic)
  {

    $this->col_usr_fullName = $fullName;
    $this->col_usr_alias = $alias;
    $this->col_usr_email = $email;
    $this->col_usr_password = $password;

    include_once '../inc/helpers/upload_helper.php';

    // MOSTRAR MENSAJE DE REGISTRO CORRECTO!!!

    $this->GuardarUsuario();
    $this->RedirectLogin();

  }

  public function VerificarRegistro($fullName, $alias, $email, $password, $profilePic)
  {

    $this->col_usr_alias = $alias;
    $this->col_usr_email = $email;

    $_SESSION['reg_prov_fullName'] = $fullName;
    $_SESSION['reg_prov_alias'] = $alias;
    $_SESSION['reg_prov_email'] = $email;

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
      $_SESSION['is_prov_alias_email'] = $alias;
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

    $_SESSION['is_prov_alias_email'] = $alias_email;

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

  public function CerrarSesion()
  {
    session_destroy();
    $this->RedirectLogin();
  }

  public function GuardarCambiosPerfil($profilePic, $alias)
  {

    $this->ActualizarUsuario();

    include_once '../inc/helpers/upload_helper.php';

    $_SESSION['success'] = 'Perfil actualizado correctamente.';
    $_SESSION['usr_alias'] = $this->col_usr_alias;
    $_SESSION['usr_fullName'] = $this->col_usr_fullName;
    $_SESSION['usr_profilePic'] = $this->col_user_profilePic;

    $this->RedirectGestionarPerfil();

  }

  public function VerificarCambiosPerfil($fullName, $alias, $password, $newPassword, $profilePic)
  {

    $this->col_usr_fullName = $fullName;
    $this->col_usr_id = $_SESSION['usr_id'];

    $usuarioActual = $this->ConsultarUsuarioPorId($this->col_usr_id);
    $usuarioProv = $this->ConsultarUsuarioPorAlias($alias);
           
    if (isset($usuarioProv->col_usr_alias) && $usuarioProv->col_usr_alias != $usuarioActual->col_usr_alias) {
      $_SESSION['error_alias'] = 'Alias ya registrado.';
      $this->col_usr_alias = $_SESSION['usr_alias'];
      #echo "<p>" .$_SESSION['error_alias'] ."</p>"; 
    } else {
      $this->col_usr_alias = $alias;
    }
     

    if (!empty($newPassword)) {
      if (password_verify($password, $usuarioActual->col_usr_password)) {
        $this->col_usr_password = password_hash($newPassword, PASSWORD_ARGON2ID);
      } else {
        $_SESSION['error_password'] = 'Contraseña incorrecta.';
        $this->RedirectGestionarPerfil();
      }
    } else {
      $this->col_usr_password = $usuarioActual->col_usr_password;
    }

    $this->col_user_profilePic = $_SESSION['usr_profilePic'];

    $this->GuardarCambiosPerfil($profilePic, $alias);

  }
}

if (isset($_GET['action']) && $_GET['action'] == 'signup') {
  $ic = new UsersController();
  $ic->MostrarSignup();
}

if (isset($_GET['action']) && $_GET['action'] == 'login') {
  $ic = new UsersController();
  $ic->MostrarLogin();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  $ic = new UsersController();
  $ic->CerrarSesion();
}

if (isset($_GET['action']) && $_GET['action'] == 'profile') {
  $ic = new UsersController();
  #$ic->MostrarPerfil();
}

if (isset($_GET['action']) && $_GET['action'] == 'edit_profile') {
  $ic = new UsersController();
  $ic->MostrarGestionarPerfil();
}



if (isset($_POST['action']) && $_POST['action'] == 'signup') {
  $ic = new UsersController();
  $ic->VerificarRegistro(
    comprobar_entrada($_POST['fNombre']),
    comprobar_entrada($_POST['fAlias']),
    comprobar_entrada($_POST['fEmail']),
    comprobar_entrada($_POST['fPassword']),
    $_FILES['fProfileAvatar']
  );
}

if (isset($_POST['action']) && $_POST['action'] == 'login' && isset($_POST['fAlias_fEmail']) && isset($_POST['fPassword'])) {
  $ic = new UsersController();
  $ic->VerificarLogin(
    comprobar_entrada($_POST['fAlias_fEmail']),
    comprobar_entrada($_POST['fPassword'])
  );
}

if (isset($_POST['action']) && $_POST['action'] == 'edit_profile') {
  $ic = new UsersController();

  $ic->VerificarCambiosPerfil(
    comprobar_entrada($_POST['fNombre']),
    comprobar_entrada($_POST['fAlias']),
    comprobar_entrada($_POST['fPassword']),
    comprobar_entrada($_POST['fNewPassword']),
    $_FILES['fProfileAvatar']
  );
}


?>