<?php

define("TITULO_PAGINA", "Editar Perfil / Lazarus");
include_once '../inc/templates/main_templates/main_header.php';
include_once '../inc/templates/main_templates/navbar.php';
include_once '../inc/components/alerts.php';

?>
<!-- Importamos hojas de estilo y scripts -->
<link rel="stylesheet" href="../public/css/index_style.css">
<link rel="stylesheet" href="../public/css/edit_profile_style.css">
<div class="content">



  <div class="edit_profile">

    <h2>Edita tu perfil</h2>

    <?php if (isset($_SESSION['success'])) {
      alertsuccess($_SESSION['success']);
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

    <form method="POST" id="edit_profile" action="UsersController.php" enctype="multipart/form-data">

      <input type="hidden" name="action" value="edit_profile">


      <div class="input-group gap-4">
        <div class="form-control w-full ">
          <label class="label">
            <span class="label-text bg-[#111820]">Correo electrónico</span>
          </label>
          <input type="email" name="fEmail" id="fEmail" placeholder="Introduzca su correo eléctronico (único para cada cuenta)" value="<?php echo isset($_SESSION['usr_email']) ? $_SESSION['usr_email'] : '' ?>" class="input w-full bg-[#111820] disabled:bg-[#111820] disabled:border-white" required disabled />
          <label class="label bg-[#111820]">
            <span class="label-text-alt"><label id="fEmail-error" class="error" for="fEmail"></label></span>
          </label>
        </div>
        <div class="form-control w-full ">
          <label class="label">
            <span class="label-text bg-[#111820]">Nombre completo</span>
          </label>
          <input type="text" name="fNombre" id="fNombre" placeholder="Introduzca su nombre completo" required value="<?php echo isset($_SESSION['usr_fullName']) ? $_SESSION['usr_fullName'] : '' ?>" class="input input-bordered input-primary w-full bg-[#111820]" />
          <label class="label ">
            <span class="label-text-alt bg-[#111820]"><label id="fNombre-error" class="error bg-[#111820]" for="fNombre"></label></span>
          </label>
        </div>
      </div>


      <div class="input-group gap-4">
        <div class="form-control w-full ">
          <label class="label">
            <span class="label-text bg-[#111820]">Alias</span>
          </label>
          <input type="text" name="fAlias" id="fAlias" placeholder="Introduzca un alias (único)" required value="<?php echo isset($_SESSION['usr_alias']) ? $_SESSION['usr_alias'] : '' ?>" class="input input-bordered input-primary w-full bg-[#111820]" />
          <label class="label">
            <span class="label-text-alt"><label id="fAlias-error" class="error" for="fAlias"></label></span>
            <span class="label-text-alt">
              <?php
              if (isset($_SESSION['error_alias'])) {
                echo "<label id=\"fAlias-error\" class=\"error\" for=\"fAlias\">" . $_SESSION['error_alias'] . "</label>";
                unset($_SESSION['error_alias']);
              }
              ?>
            </span>
          </label>
        </div>

        <div class="form-control w-full ">
          <label class="label">
            <span class="label-text bg-[#111820]">Contraseña</span>

          </label>
          <input type="password" name="fPassword" id="fPassword" placeholder="Introduzca la contraseña actual" class="input input-bordered input-primary w-full bg-[#111820]" />
          <label class="label">
            <span class="label-text-alt"><label id="fPassword-error" class="error" for="fPassword"></label></span>
          </label>

        </div>
      </div>


      <div class="input-group gap-4">
        <div class="form-control w-full ">
          <label class="label">
            <span class="label-text bg-[#111820]">Nueva clave</span>

          </label>
          <input type="password" name="fNewPassword" id="fNewPassword" placeholder="Introduzca la nueva contraseña" class="input input-bordered input-primary w-full bg-[#111820]" />
          <label class="label">
            <span class="label-text-alt"><label id="fNewPassword-error" class="error" for="fNewPassword"></label></span>
          </label>
        </div>

        <div class="form-control w-full ">
          <label class="label">
            <span class="label-text bg-[#111820]">Confirmar Clave</span>

          </label>
          <input type="password" name="fCheckNewPassword" id="fCheckNewPassword" placeholder="Confirme la nueva contraseña" class="input input-bordered input-primary w-full bg-[#111820]" />
          <label class="label">
            <span class="label-text-alt"><label id="fCheckNewPassword-error" class="error" for="fCheckNewPassword"></label></span>
          </label>
        </div>
      </div>

      <div class="form-control w-full ">
        <label class="label">
          <span class="label-text bg-[#111820]">Imagen de perfil (opcional)</span>
          <span class="label-text-alt">GIF, JPG, JPEG, PNG</span>
        </label>
        <input type="file" name="fProfileAvatar" id="fProfileAvatar" accept="image/*" onchange="mostrarVistaPreviaImagen(event);" class="file-input file-input-bordered file-input-info w-full bg-[#111820]" />
        <label class="label bg-[#111820]">
          <span class="label-text-alt error" id="image_error"></span>
        </label>
      </div>

      <button type="submit" id="submit_user" class="btn btn-outline btn-primary">ACTUALIZAR PERFIL</button>
    </form>



  </div>
  <script src="../public/js/image_validation.js"></script>
  <script type="text/javascript">
    

    $(document).ready(function() {

      
      

      $('#edit_profile').validate({
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
          fNewPassword: {
            required: "Por favor, introduzca una contraseña",
            minlength: "La contraseña debe tener al menos 8 caracteres",
            maxlength: "La contraseña no puede tener más de 50 caracteres"
          },
          fCheckNewPassword: {
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