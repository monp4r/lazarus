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
      <link rel="apple-touch-icon" sizes="180x180" href="../public/img/favicons/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="../public/img/favicons/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../public/img/favicons/favicon-16x16.png">
      <link rel="manifest" href="/site.webmanifest">

    <title> Inicio / Lazarus</title>
  </head>
  <body>