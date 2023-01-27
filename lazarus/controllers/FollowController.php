<?php 

session_start();

include_once '../inc/helpers/input_helper.php';

include_once '../models/Follow.php';

class FollowController extends Follow
{

  public function RedirectUser($usuario){
    header("location: UsersController.php?action=profile&fAlias={$usuario}", true, 303);
  }

  public function VerificarSeguirUsuario($alias_usr_followed)
  {
    $this->col_followUser_follower = $_SESSION['usr_id'];
    $this->col_followUser_followed = $alias_usr_followed;
    $_SESSION['contexto_seguimiento'] = $this->SeguirUsuario($alias_usr_followed);
    $this->RedirectUser($alias_usr_followed);
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'follow_user') {
  $ic = new FollowController();
  $ic->VerificarSeguirUsuario(comprobar_entrada($_POST['fUsuarioASeguir']));
}


?>