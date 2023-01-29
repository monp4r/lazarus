<?php 

session_start();

include_once '../inc/helpers/input_helper.php';

include_once '../models/Follow.php';

class FollowController extends Follow
{

  public function redirectUser($usuario){
    header("location: UsersController.php?action=profile&fAlias={$usuario}", true, 303);
  }

  public function redirectIndex(){
    header("location: IndexController.php?action=index", true, 303);
  }

  public function verificarSeguirUsuario($alias_usr_followed)
  {
    $this->col_followUser_follower = $_SESSION['usr_id'];
    $this->col_followUser_followed = $alias_usr_followed;
    $_SESSION['contexto_seguimiento'] = $this->seguirUsuario($alias_usr_followed);
    $this->redirectUser($alias_usr_followed);
  }

  public function mostrarUsuariosSeguidos($idUsuario)
  {
    $this->col_followUser_follower = $idUsuario;
    $listadoUsuarios = $this->obtenerSeguidos();
    include_once '../views/follow/following.php';
  }

  public function mostrarUsuarios()
  {
    $listadoUsuarios = $this->obtenerComunidad();
    include_once '../views/follow/people.php';
  }

} // Fin de la clase

// Tratamiento de peticiones HTTP GET

if (isset($_GET['action']) && $_GET['action'] == 'following') {
  $ic = new FollowController();
  if (isset($_SESSION['usr_id'])){
    $ic->mostrarUsuariosSeguidos($_SESSION['usr_id']);
  }else{
    $ic->redirectIndex();
  }
}

if (isset($_GET['action']) && $_GET['action'] == 'people') {
  $ic = new FollowController();
  if (isset($_SESSION['usr_id'])){
    $ic->mostrarUsuarios();
  }else{
    $ic->redirectIndex();
  }
}

// Tratamiento de peticiones HTTP POST

if (isset($_POST['action']) && $_POST['action'] == 'follow_user') {
  $ic = new FollowController();
  $ic->verificarSeguirUsuario(comprobar_entrada($_POST['fUsuarioASeguir']));
}


?>