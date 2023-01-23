<?php 

class Message
{

  protected $col_usrPost_id;
  protected $col_usrPost_user;
  protected $col_usrPost_text;
  protected $col_usrPost_media;

  protected $col_usrPost_createdAt;

  protected function GuardarMensaje(){
    
    include_once '../config/Connection.php';
    $ic = new Connection();  

    $sql = "INSERT INTO tab_user_post (col_usrPost_user, col_usrPost_text, col_usrPost_media) 
                 VALUES (?, ?, ?)";
    
    $insertar = $ic->db->prepare($sql);
    $insertar->bindParam(1, $this->col_usrPost_user);
    $insertar->bindParam(2, $this->col_usrPost_text);
    $insertar->bindParam(3, $this->col_usrPost_media);    
    $insertar->execute();

    $ic->closeConnection();
  }
  
}


?>