<?php

session_start();

include_once '../inc/helpers/input_helper.php';
include_once '../models/Message.php';


class MessagesController extends Message
{

  public function redirectIndex()
  {
    header("location: IndexController.php?action=index", true, 303);
  }

  public function verificarSubidaMensaje($texto, $messagePic)
  {

    $id = $_SESSION['usr_id'];
    $this->col_usrPost_user = $id;

    if (!(strlen($texto) >= 1 && strlen($texto) <= 150)) {
      $_SESSION['text_msg_error'] = 'El texto del mensaje debe tener entre 1 y 150 caracteres.';
    } else {
      $this->col_usrPost_text = $texto;
      if (isset($messagePic['name']) && $messagePic['name'] != '') {
        include_once '../inc/helpers/upload_helper_msg.php';
      }
    }
    
    if (!(isset($_SESSION['img_msg_error']) || isset($_SESSION['text_msg_error']))) {
      $this->guardarMensaje();
      $_SESSION['msg_success'] = 'Mensaje subido correctamente.';
    }
    
    $this->redirectIndex();
  }
  
} // Fin de la clase

// Tratamiento de peticiones HTTP POST

if (isset($_POST['action']) && $_POST['action'] == 'post_message') {
  $ic = new MessagesController();
  $ic->verificarSubidaMensaje(
    comprobar_entrada($_POST['fTexto']),
    $_FILES['fImagen']
  );
}

?>