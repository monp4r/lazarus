<?php

include_once '../../config/Connection.php';
$ic = new Connection();

if (isset($_POST['input'])) {
  $input = trim($_POST['input']);
  $sql = "SELECT *
            FROM tab_user
           WHERE col_usr_alias
            LIKE '$input%'
              OR col_usr_fullName
            LIKE '$input%'";

  $buscar = $ic->db->prepare($sql);
  $buscar->execute(array());
  $control = $buscar->fetchAll(PDO::FETCH_OBJ);
  $count = $buscar->rowCount();

  if ($count > 0) {
    foreach ($control as $list) {
      echo "<li>
      <a href=\"" . "./UsersController.php?action=profile&fAlias=" . $list->col_usr_alias . "\">
        <div class=\"text-sm font-normal \">
          <img class=\"h-10 w-10 rounded-full\" src=\"". $list->col_user_profilePic . "\" alt=\"\">
          <div class=\"ml-14 -mt-11\">
            <div class=\"text-base font-semibold \" style=\"display: inline-block; vertical-align: top;\">"
            . $list->col_usr_alias ."</div>
            <div class=\"text-sm font-normal\">"
            . $list->col_usr_fullName .
            "</div>
          </div>
        </div>
      </a>
    </li>";
    }
  } else {
    echo "<li><div class=\"text-base font-semibold\">NO HAY RESULTADOS</div></li>";
  }
}

?>