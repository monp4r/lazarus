<?php


if (!empty($_SESSION['usr_id'])) {
  header("location: ../controllers/IndexController.php?action=index");
}
include_once '../inc/templates/auth_templates/signup_header.php';

?>

<div class="signup">

  <h2>Regístrate en LAZARUS</h2>
  <h3>Es muy fácil y sencillo</h3>

  <form method="POST" id="signupForm" action="UsersController.php" enctype="multipart/form-data" class="form">
    <input type="hidden" name="action" value="signup">
    <div class="column">
      <div class="input-box">
        <label>Nombre Completo</label>
        <input type="text" name="fNombre" id="fNombre" placeholder="Introduzca su nombre completo" required value="<?php echo isset($_SESSION['reg_prov_fullName']) ? $_SESSION['reg_prov_fullName'] : '' ?>" />
        <span class="material-symbols-outlined"> person </span>
      </div>
      <div class="input-box">
        <label>Alias</label>
        <input type="text" name="fAlias" id="fAlias" placeholder="Introduzca un alias (único)" required value="<?php echo isset($_SESSION['reg_prov_alias']) ? $_SESSION['reg_prov_alias'] : '' ?>" />
        <?php
        if (isset($_SESSION['error_alias'])) {
          echo "<label id=\"fAlias-error\" class=\"error\" for=\"fAlias\">" . $_SESSION['error_alias'] . "</label>";
          unset($_SESSION['error_alias']);
        }
        ?>
        <span class="material-symbols-outlined">
          account_circle
        </span>
      </div>
    </div>
    <div class="input-box">
      <label>Correo electrónico</label>
      <input type="email" name="fEmail" id="fEmail" placeholder="Introduzca su correo eléctronico (único para cada cuenta)" required value="<?php echo isset($_SESSION['reg_prov_email']) ? $_SESSION['reg_prov_email'] : '' ?>" />
      <?php
      if (isset($_SESSION['error_email'])) {
        echo "<label id=\"fEmail-error\" class=\"error\" for=\"fEmail\" style=\"margin-bottom: 10px !important;\">" . $_SESSION['error_email'] . "</label>";
        unset($_SESSION['error_email']);
      }
      ?>
      <span class="material-symbols-outlined"> email </span>
    </div>
    <div class="column">
      <div class="input-box">
        <label>Contraseña</label>
        <input type="password" name="fPassword" id="fPassword" required placeholder="Introduzca una contraseña" />
        <span class="material-symbols-outlined"> key </span>
      </div>
      <div class="input-box">
        <label>Confirmar contraseña</label>
        <input type="password" name="fCheckPassword" id="CheckPassword" required placeholder="Repita la contraseña" />
        <span class="material-symbols-outlined"> key </span>
      </div>
    </div>
    <div class="column">
      <div class="input-box">
        <label>Foto de perfil (opcional)</label>
        <input type="file" name="fProfileAvatar" id="fProfileAvatar" hidden="hidden" accept="image/*" />
        <button type="button" id="custom-button">
          SUBA SU FOTO DE PERFIL
        </button>
        <label id="image_error" class="error"></label>
      </div>
    </div>
    <button type="submit" id="submit_user">ÚNETE A LAZARUS</button>
  </form>
  <a href="./UsersController.php?action=login">¿Ya te has registrado? Inicia sesión</a>
</div>

<script type="text/javascript">
  const realFileBtn = document.getElementById("fProfileAvatar");
  const customBtn = document.getElementById("custom-button");
  const customTxt = document.getElementById("custom-text");

  customBtn.addEventListener("click", function() {
    realFileBtn.click();
  });

  $(document).ready(function() {
    $('#signupForm').validate({
      errorClass: "error",
      rules: {
        fNombre: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        fEmail: {
          required: true,
          email: true,
          minlength: 3,
          maxlength: 50
        },
        fPassword: {
          required: true,
          minlength: 8,
          maxlength: 50
        },
        fCheckPassword: {
          required: true,
          minlength: 8,
          maxlength: 50,
          equalTo: "#fPassword"
        },
        fAlias: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        fProfileAvatar: {
          required: false,
          extension: "jpg|jpeg|png|gif"
        }
      },
      messages: {
        fNombre: {
          required: "Por favor, introduzca su nombre completo",
          minlength: "El nombre debe tener al menos 3 caracteres",
          maxlength: "El nombre no puede tener más de 50 caracteres"
        },
        fEmail: {
          required: "Por favor, introduzca su correo electrónico",
          email: "Por favor, introduzca un correo electrónico válido",
          minlength: "El correo electrónico debe tener al menos 3 caracteres",
          maxlength: "El correo electrónico no puede tener más de 50 caracteres"
        },
        fPassword: {
          required: "Por favor, introduzca una contraseña",
          minlength: "La contraseña debe tener al menos 8 caracteres",
          maxlength: "La contraseña no puede tener más de 50 caracteres"
        },
        fCheckPassword: {
          required: "Por favor, confirme la contraseña",
          minlength: "La contraseña debe tener al menos 8 caracteres",
          maxlength: "La contraseña no puede tener más de 50 caracteres",
          equalTo: "Las contraseñas no coinciden"
        },
        fAlias: {
          required: "Por favor, introduzca un alias",
          minlength: "El alias debe tener al menos 3 caracteres",
          maxlength: "El alias no puede tener más de 50 caracteres"
        },
        fProfileAvatar: {
          required: "Por favor, suba una foto de perfil",
          extension: "Por favor, suba una foto de perfil válida"
        }
      }
    });
  });
</script>

<?php include_once '../inc/templates/auth_templates/signup_footer.php'; ?>