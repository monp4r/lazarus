<?php 

if(empty($_SESSION['usr_id'])){
  echo "No estas logueado";
}else{
  header("location: ./controllers/IndexController.php?action=index");
}

?>