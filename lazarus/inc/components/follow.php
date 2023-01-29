<?php

function comprobarSeguimiento($seguidor, $seguido){
  include_once '../models/Follow.php';
  $im = new Follow();
  
  if($im->consultarSeguimientoUsuarios($seguidor, $seguido) > 0){
    return true;
  } else {
    return false;
  }
}

?>