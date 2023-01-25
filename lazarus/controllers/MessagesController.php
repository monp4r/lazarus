<?php

session_start();

include_once '../inc/helpers/input_helper.php';
include_once '../models/Message.php';


class MessagesController extends Message
{

  public function RedirectIndex()
  {
    header("location: IndexController.php?action=index", true, 303);
  }

  public function VerificarSubidaMensaje($texto, $profilePic)
  {

    $id = $_SESSION['usr_id'];
    $this->col_usrPost_user = $id;

    if (!(strlen($texto) >= 1 && strlen($texto) <= 150)) {
      $_SESSION['text_msg_error'] = 'El texto del mensaje debe tener entre 1 y 150 caracteres.';
    } else {
      $this->col_usrPost_text = $texto;
      if (isset($profilePic['name']) && $profilePic['name'] != '') {
        include_once '../inc/helpers/upload_helper_msg.php';
      }
    }
    
    // REDIRIGIR A INDEX O PARTE DE MENSAJES??
    if (!(isset($_SESSION['img_msg_error']) || isset($_SESSION['text_msg_error']))) {
      $this->GuardarMensaje();
      $_SESSION['msg_success'] = 'Mensaje subido correctamente.';
    }
    
    $this->RedirectIndex();
  }
}

if (isset($_POST['action']) && $_POST['action'] == 'post_message') {
  $ic = new MessagesController();
  $ic->VerificarSubidaMensaje(
    comprobar_entrada($_POST['fTexto']),
    $_FILES['fImagen']
  );
}
