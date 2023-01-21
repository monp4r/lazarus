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
  <link rel="stylesheet" href="https://tailwindui.com/v2-assets/components.css?id=66a3d921db337ae7a7c107d5cf04d6c0" />
  <script src="https://tailwindui.com/v2-assets/components.js?id=c42e44f6c92eb7517e1a4e8bd13028a6"></script>
  <script src="https://tailwindui.com/js/iframe.js?id=1aa79ddd39a17053502061b4a3352bc1" defer=""></script>
  <script src="https://tailwindui.com/js/alpine.js?id=8abb7fc694f5ad35a20d19a7cae8cb7e" defer=""></script>
  <link rel="icon" type="image/x-icon" href="./public/img/auth_assets/lazarus_logo.svg">
  <title> LAZARUS</title>
</head>

<body>
  
