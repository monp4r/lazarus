<?php

session_start();

include_once '../inc/helpers/input_helper.php';
include_once '../models/Message.php';

/**
 * MessagesController Class
 * 
 * This class is used to manage the messages actions of the users. It extends the Message class.
 */
class MessagesController extends Message
{

  public function redirectIndex()
  {
    header("location: IndexController.php?action=index", true, 303);
  }

  /**
   * verificarSubidaMensaje Function
   * 
   * Function that verifies if the message is uploaded correctly verifying some conditions.
   * 
   * @param mixed $texto
   * @param mixed $messagePic
   * @return void
   */
  public function verificarSubidaMensaje($texto, $messagePic)
  {

    // We get the user id from the session to save the message with the user id as foreign key in the table to know who has uploaded the message
    $id = $_SESSION['usr_id'];
    $this->col_usrPost_user = $id;

    // Check if the text has between 1 and 150 characters
    if (!(strlen($texto) >= 1 && strlen($texto) <= 150)) {
      $_SESSION['text_msg_error'] = 'El texto del mensaje debe tener entre 1 y 150 caracteres.';
    } else {
      $this->col_usrPost_text = $texto;
      if (isset($messagePic['name']) && $messagePic['name'] != '') {
        include_once '../inc/helpers/upload_helper_msg.php';
      }
    }
    
    // If there is no error uploading the image attached, we save the message
    if (!(isset($_SESSION['img_msg_error']) || isset($_SESSION['text_msg_error']))) {
      $this->guardarMensaje();
      $_SESSION['msg_success'] = 'Mensaje subido correctamente.';
    }
    
    $this->redirectIndex();
  }
  
} // End of class MessagesController

// Handling HTTP POST requests
if (isset($_POST['action']) && $_POST['action'] == 'post_message') {
  $ic = new MessagesController();
  $ic->verificarSubidaMensaje(
    comprobar_entrada($_POST['fTexto']),
    $_FILES['fImagen']
  );
}

?>