<?php


class Index
{

  public function obtenerMensajesUsuario($usuario)
  {
    include_once '../config/Connection.php';
    $ic = new Connection();

    $sql = "SELECT TU.col_usr_alias          AS usr_alias,
                   TU.col_usr_fullName       AS usr_fullName,
                   TU.col_user_profilePic    AS usr_profilePic,
                   TUP.col_usrPost_text      AS usrPost_text,
                   TUP.col_usrPost_media     AS usrPost_media,
                   TUP.col_usrPost_createdAt AS usrPost_createdAt
                   
              FROM tab_followUser TFU
        INNER JOIN tab_user TU               ON (TFU.col_followUser_followed = TU.col_usr_id)
        INNER JOIN tab_user_post TUP         ON TFU.col_followUser_followed = TUP.col_usrPost_user
             WHERE TFU.col_followUser_follower = ?
             
             UNION 

            SELECT TU.col_usr_alias	         AS usr_alias,
                   TU.col_usr_fullName    	 AS usr_fullName,
                   TU.col_user_profilePic    AS usr_profilePic,
                   TUP.col_usrPost_text      AS usrPost_text,
                   TUP.col_usrPost_media     AS usrPost_media,
                   TUP.col_usrPost_createdAt AS usrPost_createdAt

              FROM tab_user_post TUP
        INNER JOIN tab_user TU               ON TU.col_usr_id = TUP.col_usrPost_user 
             WHERE TUP.col_usrPost_user = ?
          ORDER BY usrPost_createdAt DESC";

    $buscar = $ic->db->prepare($sql);
    $buscar->bindParam(1, $usuario);
    $buscar->bindParam(2, $usuario);
    $buscar->execute();
    $control = $buscar->fetchAll(PDO::FETCH_OBJ);
    $count = $buscar->rowCount();

    $ic->closeConnection();

    if ($count > 0) {
      return $control;
    } else {
      return 0;
    }


  }
}


?>