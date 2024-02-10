<?php 

session_start();

include_once '../inc/helpers/input_helper.php';

include_once '../models/Index.php';

/**
 * IndexController Class
 * 
 * This class is used to manage the index actions of the users. It extends the Index class.
 * Moreover, it has a method to redirect the user to the login page.
 */
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


} // End of class IndexController

// HandlING HTTP GET requests
// If the action is index, we show the index page
// Otherwise, we redirect the user to the index page
if(isset($_GET['action']) && $_GET['action'] == 'index'){
  $index = new IndexController();
  $index->mostrarIndex();
}

?>