$(document).ready(function() {
  $("#fImagen, #fProfileAvatar").change(function() {
    var extension_archivo = $(this).val().split('.').pop().toLowerCase();
    
    var extensiones_validas = ['jpeg', 'jpg', 'png', 'gif'];
    
    if ($.inArray(extension_archivo, extensiones_validas) == -1) {
      $('#image_error').text("Por favor, suba imágenes de tipo jpg, jpeg, png o gif.").show();
      $(this).replaceWith($(this).val('').clone(true));
      $('#submit_message, #submit_user').prop('disabled', true);
    } else {
      if ($(this).get(0).files[0].size > (8388608)) {
        $('#image_error').text("Por favor, suba imágenes de tamaño menor a 8 MB").show();
        $(this).replaceWith($(this).val('').clone(true));
        $('#submit_message, #submit_user').prop('disabled', true);
      } else {
        $('#image_error').text('').hide();
        $('#submit_message, #submit_user').prop('disabled', false);
      }
    }
  });

});