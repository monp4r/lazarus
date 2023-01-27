<?php

class Message
{

  protected $col_usrPost_id;
  protected $col_usrPost_user;
  protected $col_usrPost_text;
  protected $col_usrPost_media;

  protected $col_usrPost_createdAt;

  protected function GuardarMensaje()
  {

    include_once '../config/Connection.php';
    $ic = new Connection();

    $guardadoOK = 1;
    $error = "ERROR AL GUARDAR EL MENSAJE.";

    $sql = "INSERT INTO tab_user_post (col_usrPost_user, col_usrPost_text, col_usrPost_media) 
                 VALUES (?, ?, ?)";

    $insertar = $ic->db->prepare($sql);
    $insertar->bindParam(1, $this->col_usrPost_user);
    $insertar->bindParam(2, $this->col_usrPost_text);
    $insertar->bindParam(3, $this->col_usrPost_media);
    $ic->closeConnection();

    if (!$insertar->execute()) {
      $guardadoOK = 0;
      $error = $error . " Error en la inserción de la BD.";
    }

    if ($guardadoOK == 0) {
      return $error;
    } else {
      return "Subida del mensaje realizada correctamente";
    }
  }

  
}
