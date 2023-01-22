<?php

if (!empty($_SESSION['usr_id'])) {
  header("location: ../controllers/IndexController.php?action=index");
}


include_once '../inc/templates/auth_templates/login_header.php';

?>

<div class="login-wrapper">

  <div class="login">

    <div class="logo">
      <img src="../public/img/lazarus_logo.svg" alt="Logo LAZARUS">
    </div>

    <h2>LAZARUS</h2>
    <h3>Piensa, escribe, comparte</h3>

    <label class="error">

      <?php
      if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
      ?>

    </label>

    <form method="POST" id="loginForm" action="UsersController.php" enctype="multipart/form-data" class="login-form">

      <input type="hidden" name="action" value="login">

      <div class="textbox">

        <input type="text" name="fAlias_fEmail" id="fAlias_fEmail" required
          placeholder="Introduzca su alias o correo electrónico"
          value="<?php echo isset($_SESSION['is_prov_alias_email']) ? $_SESSION['is_prov_alias_email'] : '' ?>" />
        <span class="material-symbols-outlined"> account_circle </span>
      </div>

      <div class="textbox">
        <input type="password" name="fPassword" id="fPassword" required placeholder="Introduzca su contraseña" />
        <span class="material-symbols-outlined"> key </span>
      </div>

      <button type="submit">INICIAR SESIÓN</button>

    </form>

    <a href="./UsersController.php?action=signup">¿No tiene una cuenta? Regístrese</a>

  </div>

</div>

<script type="text/javascript">

  if ($(window).width() < 450) {
    $('#fAlias_fEmail').attr('placeholder', 'Alias / Correo electrónico');
    $('#fPassword').attr('placeholder', 'Contraseña');
  }

  $(document).ready(function () {

    $('#loginForm').validate({
      errorClass: "error",
      rules: {
        fAlias_fEmail: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        fPassword: {
          required: true,
          minlength: 8,
          maxlength: 50
        }
      },
      messages: {
        fAlias_fEmail: {
          required: "Por favor, introduzca su alias o correo electrónico",
          minlength: "El alias o correo electrónico debe tener al menos 3 caracteres",
          maxlength: "El alias o correo electrónico debe tener como máximo 50 caracteres"
        },
        fPassword: {
          required: "Por favor, introduzca su contraseña",
          minlength: "La contraseña debe tener al menos 8 caracteres",
          maxlength: "La contraseña debe tener como máximo 50 caracteres"
        }
      }
    });
  });

</script>

<?php include_once '../inc/templates/auth_templates/login_footer.php'; ?>