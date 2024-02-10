<?php

include_once '../models/User.php';

/**
 * Follow Class
 * 
 * Data model of all user actions related to use persistence data.
 * 
 */
class Follow extends User
{

  protected $col_followUser_follower;
  protected $col_followUser_followed;


  // 
  public function consultarSeguimientoUsuarios($seguidor, $seguido)
  {

    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT *
              FROM tab_followUser
             WHERE col_followUser_follower = ?
               AND col_followUser_followed = ?";

    $consulta = $ic->db->prepare($sql);
    $consulta->bindParam(1, $seguidor);
    $consulta->bindParam(2, $seguido);
    $consulta->execute();

    $ic->closeConnection();

    return $consulta->rowCount();
  }

  // We use this method to follow a user
  public function seguirUsuario($alias_usr_followed)
  {
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "INSERT INTO tab_followUser (col_followUser_follower, col_followUser_followed) 
                 VALUES (?, ?)";

    $usr_prov = $this->consultarUsuarioPorAlias($alias_usr_followed);

    $seguimientoOK = 1;
    $error = "Error:";

    if(isset($usr_prov->col_usr_id)){

      $this->col_followUser_followed = $usr_prov->col_usr_id;

      // We check if the user is trying to follow himself
      if($this->col_followUser_followed == $this->col_followUser_follower){
        $seguimientoOK = 0;
        $error = $error . " No puedes seguirte a ti mismo.";
      } else {
        // We check if the user is already following the user
        if($this->consultarSeguimientoUsuarios($this->col_followUser_follower, $this->col_followUser_followed) > 0){
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
      return "<div class=\"alert alert-error shadow-lg\">
      <div>
        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"stroke-current flex-shrink-0 h-6 w-6\" fill=\"none\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z\" /></svg>
        <span>" . $error ."</span>
      </div>
    </div>";
    }else{
      return "<div class=\"alert alert-success shadow-lg\">
      <div>
        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"stroke-current flex-shrink-0 h-6 w-6\" fill=\"none\" viewBox=\"0 0 24 24\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z\" /></svg>
        <span>Seguimiento realizado correctamente</span>
      </div>
    </div>";
    }

  }

  // We use this method to obtain the users followed by the user
  public function obtenerSeguidos(){
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT TU.col_usr_alias      AS usr_alias,
                   TU.col_usr_fullname   AS usr_fullname,
                   TU.col_user_profilePic AS usr_profilePic
              FROM tab_followUser
              JOIN tab_user TU ON col_followUser_followed = col_usr_id
             WHERE col_followUser_follower = ?";

    $consulta = $ic->db->prepare($sql);
    $consulta->bindParam(1, $this->col_followUser_follower);
    $consulta->execute();
    $objetoUsuario = $consulta->fetchAll(PDO::FETCH_OBJ);

    $ic->closeConnection();

    return $objetoUsuario;
  }

  // We use this method to obtain the users that the user can follow
  public function obtenerComunidad(){
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT col_usr_id          AS usr_id,
                   col_usr_alias       AS usr_alias,
                   col_usr_fullname    AS usr_fullname,
                   col_user_profilePic AS usr_profilePic
              FROM tab_user";

    $consulta = $ic->db->prepare($sql);
    $consulta->bindParam(1, $this->col_followUser_follower);
    $consulta->execute();
    $objetoUsuario = $consulta->fetchAll(PDO::FETCH_OBJ);

    $ic->closeConnection();

    return $objetoUsuario;
  }

}

?>