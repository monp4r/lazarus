<?php



define("TITULO_PAGINA", "Editar Perfil / Lazarus");
include_once '../inc/templates/main_templates/main_header.php';
include_once '../inc/templates/main_templates/navbar.php';
include_once '../inc/components/alerts.php';
?>

<div class="content">

  <?php if (isset($_SESSION['success'])) {
    alertSuccess($_SESSION['success']);
    unset($_SESSION['success']);

  }

  if (isset($_SESSION['error_password'])) {
    alertError($_SESSION['error_password']);
    unset($_SESSION['error_password']);
  }
  
  if (isset($_SESSION['error_alias'])) {
    alertError($_SESSION['error_alias']);
    unset($_SESSION['error_alias']);
  }

  ?>




  <form method="POST" id="loginForm" action="UsersController.php" enctype="multipart/form-data" class="login-form">

    <input type="hidden" name="action" value="edit_profile">

    <div class="column">
      <div class="input-box">
        <label>Nombre Completo</label>
        <input type="text" name="fNombre" id="fNombre" placeholder="Introduzca su nombre completo" required
          value="<?php echo isset($_SESSION['usr_fullName']) ? $_SESSION['usr_fullName'] : '' ?>" />
        <span class="material-symbols-outlined"> person </span>
      </div>
      <div class="input-box">
        <label>Alias</label>
        <input type="text" name="fAlias" id="fAlias" placeholder="Introduzca un alias (único)" required value="<?php echo isset($_SESSION['usr_alias']) ? $_SESSION['usr_alias'] : ''
          ?>" />
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

    <div class="column">
      <div class="input-box">
        <label>Contraseña</label>
        <input type="password" name="fPassword" id="fPassword" placeholder="Introduzca una contraseña" />
        <span class="material-symbols-outlined"> key </span>
      </div>
      <div class="input-box">
        <label>Nueva contraseña</label>
        <input type="password" name="fNewPassword" id="fNewPassword" placeholder="Repita la contraseña" />
        <span class="material-symbols-outlined"> key </span>
      </div>
      <div class="input-box">
        <label>Confirmar nueva contraseña</label>
        <input type="password" name="fCheckNewPassword" id="fCheckNewPassword" placeholder="Repita la contraseña" />
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
      </div>
    </div>
    <button type="submit">ÚNETE A LAZARUS</button>

  </form>

</div>

<script type="text/javascript">

  const realFileBtn = document.getElementById("fProfileAvatar");
  const customBtn = document.getElementById("custom-button");
  const customTxt = document.getElementById("custom-text");

  customBtn.addEventListener("click", function () {
    realFileBtn.click();
  });

  $(document).ready(function () {
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
        fNewPassword: {
          required: true,
          minlength: 8,
          maxlength: 50,

        },
        fCheckNewPassword: {
          required: true,
          minlength: 8,
          maxlength: 50,
          equalTo: "#fNewPassword"
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


<?php
include_once '../inc/templates/main_templates/main_footer.php';
?>