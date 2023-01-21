<?php 

session_start();

if(empty($_SESSION['usr_id'])){
  header("location: ./controllers/UsersController.php?action=login");
}else{
  header("location: ./controllers/IndexController.php?action=index");
}

?>