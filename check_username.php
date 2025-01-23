<script>
  $(document).ready(function() {
    $(document).on('click', '#getUser', function(e) {
      e.preventDefault();
      var uid = $(this).data('id');
      $.ajax({
        url: 'view_user.php',
        type: 'POST',
        data: 'id=' + uid,
        beforeSend: function() {
          $("#e_user").html('Working on, please wait...');
        },
        success: function(data) {
          $("#e_user").html(data);
        },
      });
    });

    $(document).on('submit', 'form', function(e) {
      e.preventDefault();
      var username = $('#user').val();

      // Check if the username already exists
      $.ajax({
        url: 'check_username.php',
        type: 'POST',
        data: 'username=' + username,
        success: function(data) {
          if (data === 'taken') {
            alert('This username is already taken. Please try again.');
          } else {
            $('form').unbind('submit').submit();
          }
        },
      });
    });
  });
</script>