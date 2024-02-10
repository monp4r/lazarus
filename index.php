<?php 

/**
 * This is the first file that is executed when the user enters to the app,
 * we control the session here to redirect the user to the correct page of the app.
 * 
 * If the user is not logged in, we redirect the user to the login page.
 * 
 * Since this point, we are going to use the controllers to manage the actions of the users, 
 * following the MVC pattern architecture.  
 */

if(empty($_SESSION['usr_id'])){
  header("location: ./controllers/UsersController.php?action=login");
}else{
  header("location: ./controllers/IndexController.php?action=index");
}

?>