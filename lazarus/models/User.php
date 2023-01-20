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

  }

  protected function ConsultarUsuario($alias, $email)
  {
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT *
              FROM tab_user 
             WHERE col_usr_alias = '$alias'
                OR col_usr_email = '$email'";

    $consulta = $ic->db->prepare($sql);
    $consulta->execute();
    
    $objetousuario = $consulta->fetchAll(PDO::FETCH_OBJ);
    foreach($objetousuario as $usuario){}

    if(empty($usuario)){
      $usuario = 'sin_datos';
    }
    
    return $usuario;

  }

}

?>