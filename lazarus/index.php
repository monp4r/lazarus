<?php

session_start();

echo '<p>' . "ESTAMOS EN EL INDEX" . '</p>' . "<br>";

if (empty($_SESSION['usr_id'])) {

  header("location: controllers/UsersController.php?action=login");

} else {

  echo '<p>' . $_SESSION['usr_id'] . '</p>' . "<br>";
  echo '<p>' . $_SESSION['usr_email'] . '</p>' . "<br>";
  echo '<p>' . $_SESSION['usr_alias'] . '</p>' . "<br>";
  echo '<p>' . $_SESSION['usr_fullName'] . '</p>' . "<br>";
  echo '<p>' . $_SESSION['usr_profilePic'] . '</p>' . "<br>";
  echo '<p>' . $_SESSION['usr_createdAt'] . '</p>' . "<br>";

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MVC LAZARUS</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.47.0/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-color: #111820;
    }

    h1 {
      color: white;
      text-align: center;
    }
  </style>
</head>

<body>
  <label for="input">Illo</label>
  <input type="file" class="file-input " style="color:white; background: rgb(33, 108, 231);
  background: linear-gradient(
    90deg,
    rgba(33, 108, 231, 1) 0%,
    rgba(33, 108, 231, 0.5326505602240896) 100%
  );
  
  width: 25%;

  " />


</body>

</html>