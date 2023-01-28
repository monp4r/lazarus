<?php 

class User{

  protected $col_usr_id;
  protected $col_usr_email;
  protected $col_usr_password;
  protected $col_usr_alias;
  protected $col_usr_fullName;
  protected $col_user_profilePic;
  protected $col_usr_createdAt;
  protected $aux_usr_alias_email;

  protected function GuardarUsuario(){
    
    include_once '../config/Connection.php';
    $ic = new Connection();  

    $sql = "INSERT INTO tab_user (col_usr_email, col_usr_password, col_usr_alias, col_usr_fullName, col_user_profilePic) 
                 VALUES (?, ?, ?, ?, ?)";
    
    $newPassword = password_hash($this->col_usr_password, PASSWORD_ARGON2ID);

    $insertar = $ic->db->prepare($sql);
    $insertar->bindParam(1, $this->col_usr_email);
    $insertar->bindParam(2, $newPassword);
    $insertar->bindParam(3, $this->col_usr_alias);
    $insertar->bindParam(4, $this->col_usr_fullName);
    $insertar->bindParam(5, $this->col_user_profilePic);
    $insertar->execute();

    $ic->closeConnection();
  }

  protected function ConsultarUsuario($alias, $email)
  {
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT *
              FROM tab_user 
             WHERE col_usr_alias = ?
                OR col_usr_email = ?";

    $consulta = $ic->db->prepare($sql);
    $consulta->bindParam(1, $alias);
    $consulta->bindParam(2, $email);
    $consulta->execute();
    
    $objetousuario = $consulta->fetchAll(PDO::FETCH_OBJ);
    foreach($objetousuario as $usuario){}

    if(empty($usuario)){
      $usuario = 'sin_datos';
    }
    
    $ic->closeConnection();
    return $usuario;

  }

  protected function ConsultarUsuarioPorAlias($alias)
  {
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT *
              FROM tab_user 
             WHERE col_usr_alias = ?";

    $consulta = $ic->db->prepare($sql);
    $consulta->bindParam(1, $alias);
    $consulta->execute();
    
    $objetousuario = $consulta->fetchAll(PDO::FETCH_OBJ);
    foreach($objetousuario as $usuario){}

    if(empty($usuario)){
      $usuario = 'sin_datos';
    }
    
    $ic->closeConnection();
    return $usuario;

  }

  protected function ConsultarUsuarioPorId($id){
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT *
              FROM tab_user 
             WHERE col_usr_id = ?";

    $consulta = $ic->db->prepare($sql);
    $consulta->bindParam(1, $id);

    $consulta->execute();
    
    $objetousuario = $consulta->fetchAll(PDO::FETCH_OBJ);
    foreach($objetousuario as $usuario){}

    if(empty($usuario)){
      $usuario = 'sin_datos';
    }
    
    $ic->closeConnection();
    return $usuario;
  }

  protected function ActualizarUsuario(){
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "UPDATE tab_user
               SET col_usr_alias = ?,
                   col_usr_fullName = ?,
                   col_user_profilePic = ?,
                   col_usr_password = ?
             WHERE col_usr_id = ?";

    $actualizar = $ic->db->prepare($sql);
    $actualizar->bindParam(1, $this->col_usr_alias);
    $actualizar->bindParam(2, $this->col_usr_fullName);
    $actualizar->bindParam(3, $this->col_user_profilePic);
    $actualizar->bindParam(4, $this->col_usr_password);
    $actualizar->bindParam(5, $this->col_usr_id);
    $actualizar->execute();
       
    $ic->closeConnection();
  }

  public function ObtenerMensajesUsuario($usuario)
  {
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT col_usrPost_id,
                   col_usrPost_user,
                   TU.col_usr_alias AS usr_alias,
                   TU.col_usr_fullName AS usr_fullName,
                   TU.col_user_profilePic AS usr_profilePic,
                   col_usrPost_text AS usrPost_text,
                   col_usrPost_media AS usrPost_media,
                   col_usrPost_createdAt AS usrPost_createdAt
              FROM tab_user_post TUP, tab_user TU
             WHERE TU.col_usr_id = TUP.col_usrPost_user
               AND TUP.col_usrPost_user = (SELECT col_usr_id
                                             FROM tab_user
                                            WHERE col_usr_alias = ?)
          ORDER BY col_usrPost_createdAt DESC";

    $buscar = $ic->db->prepare($sql);
    $buscar->bindParam(1, $usuario);
    $buscar->execute();
    $control = $buscar->fetchAll(PDO::FETCH_OBJ);
    $count = $buscar->rowCount();

    $ic->closeConnection();

    if($count > 0) {
      return $control;
    } else {
      return 0;
    }

  }

  public function ObtenerSeguidoresUsuario($alias){
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT *
              FROM tab_followUser
             WHERE col_followUser_followed =
           (SELECT col_usr_id
              FROM tab_user
             WHERE col_usr_alias = ?)";

    $obtener = $ic->db->prepare($sql);
    $obtener->bindParam(1, $alias);
    $obtener->execute();
    $count = $obtener->rowCount();

    $ic->closeConnection();
    return $count;

  }

  public function ObtenerSeguidosUsuario($alias){
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT *
              FROM tab_followUser
             WHERE col_followUser_follower =
           (SELECT col_usr_id
              FROM tab_user
             WHERE col_usr_alias = ?)";

    $obtener = $ic->db->prepare($sql);
    $obtener->bindParam(1, $alias);
    $obtener->execute();
    $count = $obtener->rowCount();

    $ic->closeConnection();
    return $count;

  }



}

?>