<?php

if (empty($_SESSION['usr_id'])) {
  header("location: controllers/UsersController.php?action=login");
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Importamos hojas de estilo y scripts -->
    
      <!-- Importamos Tailwind CSS -->
      <link
        rel="stylesheet"
        href="../public/css/tailwind_components.css"
      />
      <script src="../public/js/tailwind_components.js"></script>
      
      <!-- Importamos Alpine JS -->
      <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

      <!-- Importamos JQuery y JQuery Validator -->
      <script src="../public/js/jquery-3.6.3.min.js"></script>
      <script src="../public/js/jquery.validate.js"></script>

      <!-- Importamos Icono Lazarus -->
      <link rel="icon" type="image/x-icon" href="../public/img/auth_assets/lazarus_logo.svg">

    <title> Inicio / Lazarus</title>
  </head>
  <body>