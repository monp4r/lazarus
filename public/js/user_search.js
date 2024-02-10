$(document).ready(function() {
  $('.live_search').keyup(function() {
    var input = $(this).val();
    if (input != "") {
      $.ajax({
        url: "../inc/helpers/search_bar_users.php",
        method: "POST",
        data: {
          input: input
        },
        success: function(data) {
          $('.searchresult').html(data);
        }
      })
    } else {
      $('.searchresult').html("");
    }
  });



});

$(document).click(function() {
  $('.searchresult').html("");
  $('.live_search').val("");
});