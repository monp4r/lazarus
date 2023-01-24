<?php

include_once '../models/User.php';

class Follow extends User
{

  protected $col_followUser_follower;
  protected $col_followUser_followed;

  protected function ConsultarSeguimientoUsuarios()
  {

    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT *
              FROM tab_followUser
             WHERE col_followUser_follower = ?
               AND col_followUser_followed = ?";

    $consulta = $ic->db->prepare($sql);
    $consulta->bindParam(1, $this->col_followUser_follower);
    $consulta->bindParam(2, $this->col_followUser_followed);
    $consulta->execute();

    $ic->closeConnection();

    return $consulta->rowCount();
  }


  protected function SeguirUsuario($alias_usr_followed)
  {
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "INSERT INTO tab_followUser (col_followUser_follower, col_followUser_followed) 
                 VALUES (?, ?)";

    $usr_prov = $this->ConsultarUsuarioPorAlias($alias_usr_followed);

    $seguimientoOK = 1;
    $error = "ERROR AL SEGUIR AL USUARIO.";

    if(isset($usr_prov->col_usr_id)){

      $this->col_followUser_followed = $usr_prov->col_usr_id;

      if($this->col_followUser_followed == $this->col_followUser_follower){
        $seguimientoOK = 0;
        $error = $error . " No puedes seguirte a ti mismo.";
      } else {
        if($this->ConsultarSeguimientoUsuarios() > 0){
          $seguimientoOK = 0;
          $error = $error . " Ya sigues a este usuario";
        }
      }

      if($seguimientoOK == 1){
        $consulta = $ic->db->prepare($sql);
        $consulta->bindParam(1, $this->col_followUser_follower);
        $consulta->bindParam(2, $this->col_followUser_followed);
        if(!$consulta->execute()){
          $seguimientoOK = 0;
          $error = $error . " Error al realizar el seguimiento.";
        }
      } 

    }else{
      $seguimientoOK = 0;
      $error = $error . " No existe el usuario.";
    }

    if($seguimientoOK == 0){
      return $error;
    }else{
      return "Seguimiento realizado correctamente";
    }

  }
}
