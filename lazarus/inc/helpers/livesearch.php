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

  echo "<div class=\"absolute mt-2 w-full overflow-hidden rounded-md bg-white
  shadow-lg  ring-1 ring-black ring-opacity-5
  \">
    <div class=\"cursor-pointer py-2 px-3 hover:bg-slate-100\">
    <table>";

  if ($count > 0) {

    foreach ($control as $list) {

      echo "<tr shadow-lg  ring-black ring-opacity-5>" .
        "<td class=\"p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0\"onclick=\"window.location='" .
        // PONER LINK PARA VER USUARIOS
        "http://example.com/$list->col_usr_alias"
        . "'\">" .

        "<img class=\"h-10 w-10 rounded-full\" src=\"" . $list->col_user_profilePic . "\" alt=\"Neil Sims avatar\">
        <div class=\"text-sm font-normal text-gray-500\">
        <div class=\"text-base font-semibold text-gray-900\">" . $list->col_usr_alias . "</div>
        <div class=\"text-sm font-normal text-gray-500\">" . $list->col_usr_fullName . "</div>";
    }
  } else {
    echo "<tr shadow-lg  ring-black ring-opacity-5><td class=\"p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0\>
    <div class=\"text-sm font-normal text-gray-500\"><div class=\"text-base font-semibold text-gray-900\">" . "NO HAY RESULTADOS" . "";
  }
  echo "</div></td></tr></table></div></div>";
}
