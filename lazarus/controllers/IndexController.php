<?php 

session_start();

include_once '../inc/helpers/input_helper.php';

include_once '../models/Index.php';

class IndexController extends Index
{

  public function redirectIndex()
  {
    header("location: IndexController.php?action=index", true, 303);
  }

  public function redirectLogin()
  {
    header("location: UsersController.php?action=login", true, 303);
  }

  public function mostrarIndex()
  {
    if(empty($_SESSION['usr_id'])){
      $this->redirectLogin();
    }else{
      $mensajesUsuario = $this->obtenerMensajesUsuario($_SESSION['usr_id']);
      include_once '../views/index/index.php';
    }
  }


} // Fin de la clase

// Tratamiento de peticiones HTTP GET

if(isset($_GET['action']) && $_GET['action'] == 'index'){
  $index = new IndexController();
  $index->mostrarIndex();
}

?>