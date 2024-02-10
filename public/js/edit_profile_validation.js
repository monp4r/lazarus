$(document).ready(function () {
  $("#fNombre, #fAlias, #fPassword, #fNewPassword, #fCheckNewPassword ").keyup(
    function () {
      if (
        $("#fAlias").val().length < 3 ||
        $("#fAlias").val().length > 50 ||
        $("#fNombre").val().length < 3 ||
        $("#fNombre").val().length > 50
      ) {
        $("#submit_user").prop("disabled", true);
      } else {
        $("#submit_user").prop("disabled", false);
        if ($("#fNewPassword").val() != 0) {
          if ($("#fNewPassword").val() != $("#fCheckNewPassword").val() && $('#fPassword').val() === '') {
            $("#submit_user").prop("disabled", true);
          } else {
            if (
              $("#fNewPassword").val().length < 8 ||
              $("#fNewPassword").val().length > 50 ||
              $("#fCheckNewPassword").val().length < 8 ||
              $("#fCheckNewPassword").val().length > 50
            ) {
              $("#submit_user").prop("disabled", true);
            } else {
              $("#submit_user").prop("disabled", false);
            }
          }
        }
      }
    }
  );

  $("#edit_profile").validate({
    errorClass: "error",
    rules: {
      fNombre: {
        required: true,
        minlength: 3,
        maxlength: 50,
      },
      fEmail: {
        required: true,
        email: true,
        minlength: 3,
        maxlength: 50,
      },
      fPassword: {
        required: true,
        minlength: 8,
        maxlength: 50,
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
        equalTo: "#fNewPassword",
      },
      fAlias: {
        required: true,
        minlength: 3,
        maxlength: 50,
      },
      fProfileAvatar: {
        required: false,
        extension: "jpg|jpeg|png|gif",
      },
    },
    messages: {
      fNombre: {
        required: "Por favor, introduzca su nombre completo",
        minlength: "El nombre debe tener al menos 3 caracteres",
        maxlength: "El nombre no puede tener más de 50 caracteres",
      },
      fEmail: {
        required: "Por favor, introduzca su correo electrónico",
        email: "Por favor, introduzca un correo electrónico válido",
        minlength: "El correo electrónico debe tener al menos 3 caracteres",
        maxlength: "El correo electrónico no puede tener más de 50 caracteres",
      },
      fPassword: {
        required: "Por favor, introduzca una contraseña",
        minlength: "La contraseña debe tener al menos 8 caracteres",
        maxlength: "La contraseña no puede tener más de 50 caracteres",
      },
      fNewPassword: {
        required: "Por favor, introduzca una contraseña",
        minlength: "La contraseña debe tener al menos 8 caracteres",
        maxlength: "La contraseña no puede tener más de 50 caracteres",
      },
      fCheckNewPassword: {
        required: "Por favor, confirme la contraseña",
        minlength: "La contraseña debe tener al menos 8 caracteres",
        maxlength: "La contraseña no puede tener más de 50 caracteres",
        equalTo: "Las contraseñas no coinciden",
      },
      fAlias: {
        required: "Por favor, introduzca un alias",
        minlength: "El alias debe tener al menos 3 caracteres",
        maxlength: "El alias no puede tener más de 50 caracteres",
      },
      fProfileAvatar: {
        required: "Por favor, suba una foto de perfil",
        extension: "Por favor, suba una foto de perfil válida",
      },
    },
  });
});
