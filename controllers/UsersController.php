<?php

session_start();

include_once '../models/User.php';

include_once '../inc/helpers/input_helper.php';

/**
 * UsersController Class
 * 
 * This class is used to manage the users actions. It extends the User class.
 * This class is gonna be used to manage the users actions like login, signup, logout, edit profile, etc.
 * Is the class more important of this app, following the MVC architecture.
 */
class UsersController extends User
{

  // Redirection methods
  public function redirect()
  {
    header("location: IndexController.php?action=index", true, 303);
  }

  public function redirectLogin()
  {
    header("location: UsersController.php?action=login", true, 303);
  }

  public function redirectSignup()
  {
    header("location: UsersController.php?action=signup", true, 303);
  }

  public function redirectGestionarPerfil()
  {
    header("location: UsersController.php?action=edit_profile", true, 303);
  }

  // Show methods
  public function mostrarLogin()
  {
    include_once '../views/users/login.php';
  }

  public function mostrarSignup()
  {
    include_once '../views/users/signup.php';
  }

  public function mostrarGestionarPerfil()
  {
    include_once '../views/users/edit_profile.php';
  }

  public function mostrarPerfil($usuario){
    
    $datosUsuario = $this->consultarUsuarioPorAlias($usuario);
    $mensajesUsuario = $this->obtenerMensajesUsuario($usuario);
    include_once '../views/users/profile.php';
  }

  // Methods to manage the users actions

  // Method to register a user, it saves the user in the database and redirects to the login page if the user is registered correctly
  public function registrarUsuario($fullName, $alias, $email, $password, $profilePic)
  {

    $this->col_usr_fullName = $fullName;
    $this->col_usr_alias = $alias;
    $this->col_usr_email = $email;
    $this->col_usr_password = $password;

    include_once '../inc/helpers/upload_helper_profilePic_signup.php';

    unset($_SESSION['reg_prov_fullName']);
    unset($_SESSION['reg_prov_alias']);
    unset($_SESSION['reg_prov_email']);

    $_SESSION['success'] = 'Perfil registrado correctamente. Inicie sesión.';
    $this->guardarUsuario();
    $this->redirectLogin();
  }

  // Method to verify if the user is registered correctly
  public function verificarRegistro($fullName, $alias, $email, $password, $profilePic)
  {
    
    $_SESSION['reg_prov_fullName'] = $fullName;
    $_SESSION['reg_prov_alias'] = $alias;
    $_SESSION['reg_prov_email'] = $email;

    $usuario = $this->consultarUsuario($alias, $email);

    if ($usuario !== 'sin_datos') {
      if ($usuario->col_usr_alias == $alias) {
        $_SESSION['error_alias'] = 'Alias ya registrado.';
      }
      if ($usuario->col_usr_email == $email)
        $_SESSION['error_email'] = 'Email ya registrado.';
      $this->redirectSignup();
    } else {
      $this->registrarUsuario($fullName, $alias, $email, $password, $profilePic);
      $_SESSION['is_prov_alias_email'] = $alias;
    }
  }

  // Method to start a session
  public function iniciarSesion($usuario)
  {
    $_SESSION['usr_id'] = $usuario->col_usr_id;
    $_SESSION['usr_email'] = $usuario->col_usr_email;
    $_SESSION['usr_alias'] = $usuario->col_usr_alias;
    $_SESSION['usr_fullName'] = $usuario->col_usr_fullName;
    $_SESSION['usr_profilePic'] = $usuario->col_user_profilePic;
    $_SESSION['usr_createdAt'] = $usuario->col_usr_createdAt;

    $this->redirect();
  }

  // Method to verify if the user has logged in correctly
  public function verificarLogin($alias_email, $password)
  {

    $this->aux_usr_alias_email = $alias_email;
    $this->col_usr_password = $password;

    $_SESSION['is_prov_alias_email'] = $alias_email;

    $usuario = $this->consultarUsuario($alias_email, $alias_email);

    if ($usuario == 'sin_datos') {
      $_SESSION['error'] = 'Usuario no encontrado';
      $this->redirectLogin();
    } else {
      if (password_verify($this->col_usr_password, $usuario->col_usr_password)) {
        $this->iniciarSesion($usuario);
      } else {
        $_SESSION['error'] = 'Contraseña incorrecta. Inténtelo de nuevo';
        $this->redirectLogin();
      }
    }
  }

  // Method to close the session
  public function cerrarSesion()
  {
    session_destroy();
    $this->redirectLogin();
  }

  // Method to update the user profile
  public function guardarCambiosPerfil($profilePic, $alias)
  {
    include_once '../inc/helpers/upload_helper_profilePic_update.php';
    $this->actualizarUsuario();

    if(!(isset($_SESSION['error_alias']) || isset($_SESSION['error_password']))){
      $_SESSION['success'] = 'Perfil actualizado correctamente.';
    }

    $_SESSION['usr_alias'] = $this->col_usr_alias;
    $_SESSION['usr_fullName'] = $this->col_usr_fullName;

    $this->redirectGestionarPerfil();
  }

  // Method to verify if the user has updated the profile correctly
  public function verificarCambiosPerfil($fullName, $alias, $password, $newPassword, $profilePic)
  {

    $this->col_usr_fullName = $fullName;
    $this->col_usr_id = $_SESSION['usr_id'];

    $usuarioActual = $this->consultarUsuarioPorId($this->col_usr_id);
    $usuarioProv = $this->consultarUsuarioPorAlias($alias);

    if (isset($usuarioProv->col_usr_alias) && $usuarioProv->col_usr_alias != $usuarioActual->col_usr_alias) {
      $_SESSION['error_alias'] = 'Alias ya registrado.';
      $this->col_usr_alias = $_SESSION['usr_alias'];
    } else {
      $this->col_usr_alias = $alias;
    }

    if (isset($newPassword) && $newPassword !== '') {
      if (password_verify($password, $usuarioActual->col_usr_password)) {
        if($newPassword != $password){
          $this->col_usr_password = password_hash($newPassword, PASSWORD_ARGON2ID);
        }else{
          $_SESSION['error_password'] = 'La nueva contraseña no puede ser igual a la anterior.';
          $this->redirectGestionarPerfil();
        }
      } else {
        $_SESSION['error_password'] = 'Contraseña incorrecta.';
        $this->redirectGestionarPerfil();
      }
    } else {
      $this->col_usr_password = $usuarioActual->col_usr_password;
    }
    
    $this->guardarCambiosPerfil($profilePic, $alias);
    
  }

} // End of class UsersController

// Handling HTTP GET requests

if (isset($_GET['action']) && $_GET['action'] == 'signup') {
  $ic = new UsersController();
  $ic->mostrarSignup();
}

if (isset($_GET['action']) && $_GET['action'] == 'login') {
  $ic = new UsersController();
  $ic->mostrarLogin();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  $ic = new UsersController();
  $ic->cerrarSesion();
}

if (isset($_GET['action']) && $_GET['action'] == 'profile') {  
    $ic = new UsersController();
    $ic->mostrarPerfil(comprobar_entrada($_GET['fAlias']));
}

if (isset($_GET['action']) && $_GET['action'] == 'edit_profile' && isset($_SESSION['usr_id'])) {
  $ic = new UsersController();
  $ic->mostrarGestionarPerfil();
}

// Handling HTTP POST requests
// Here we sanitize the inputs with the comprobar_entrada method and call the other methods to manage the users actions

if (isset($_POST['action']) && $_POST['action'] == 'signup') {
  $ic = new UsersController();
  $ic->verificarRegistro(
    comprobar_entrada($_POST['fNombre']),
    comprobar_entrada($_POST['fAlias']),
    comprobar_entrada($_POST['fEmail']),
    comprobar_entrada($_POST['fPassword']),
    $_FILES['fProfileAvatar']
  );
}

if (isset($_POST['action']) && $_POST['action'] == 'login') {
  $ic = new UsersController();
  $ic->verificarLogin(
    comprobar_entrada($_POST['fAlias_fEmail']),
    comprobar_entrada($_POST['fPassword'])
  );
}

if (isset($_POST['action']) && $_POST['action'] == 'edit_profile') {
  $ic = new UsersController();
  $ic->verificarCambiosPerfil(
    comprobar_entrada($_POST['fNombre']),
    comprobar_entrada($_POST['fAlias']),
    comprobar_entrada($_POST['fPassword']),
    comprobar_entrada($_POST['fNewPassword']),
    $_FILES['fProfileAvatar']
  );
}

?>


