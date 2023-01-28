<?php 

session_start();

include_once '../inc/helpers/input_helper.php';

include_once '../models/Index.php';

class IndexController extends Index
{

  public function RedirectIndex()
  {
    header("location: IndexController.php?action=index", true, 303);
  }

  public function RedirectLogin()
  {
    header("location: UsersController.php?action=login", true, 303);
  }

  public function MostarIndex()
  {
    if(empty($_SESSION['usr_id'])){
      $this->RedirectLogin();
    }else{
      $mensajesUsuario = $this->ObtenerMensajesUsuario($_SESSION['usr_id']);
      include_once '../views/index/index.php';
    }
  }


}

if(isset($_GET['action']) && $_GET['action'] == 'index'){
  $index = new IndexController();
  $index->MostarIndex();
}

?>