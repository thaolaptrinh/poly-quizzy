<div class="form-register">
  <form action="" method="post" id="form-register" data-redirect="<?= __BASE_URL__ ?>">
    <div class="mb-3 flex flex-row gap-x-5">
      <div class="form-field">
        <label for="first-name">First name</label>
        <input type="text" name="first-name" id="first-name" class="form-input" placeholder="">
      </div>
      <div class="form-field">
        <label for="last-name">Last name</label>
        <input type="text" name="last-name" id="last-name" class="form-input" placeholder="">
      </div>
    </div>

    <div class="mb-3 form-field">
      <label for="Email">Email</label>
      <input type="text" name="email" id="Email" class="form-input" placeholder="">
    </div>


    <div class="mb-3 form-field">
      <label for="Password">Password</label>
      <input type="password" name="password" id="Password" class="form-input" placeholder="">
    </div>

    <div class="mb-3 form-field">
      <label for="confirm-password">Confirm password</label>
      <input type="password" name="confirm-password" id="confirm-password" class="form-input" placeholder="">
    </div>


    <div class="flex gap-5 mt-[50px]">
      <button type="submit" class="button button--primary">Signup</button>
      <a href="<?= __BASE_URL__ . '/login' ?>" class="button button--normal">Login</a>
    </div>

  </form>
</div>

<script>
  $(document).ready(function() {

    $('#form-register').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "<?= __BASE_URL__ . '/client/auth/request' ?>",
        data: {
          type: 'register',
          first_name: $('[name="first-name"]').val(),
          last_name: $('[name="last-name"]').val(),
          email: $('[name="email"]').val(),
          password: $('[name="password"]').val(),
          confirm_password: $('[name="confirm-password"]').val(),
        },
        dataType: "json",
        success: function(res) {
          Swal.fire({
            icon: res.status,
            title: 'Msg...',
            text: res.msg,
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then((result) => {
            if (result.isConfirmed && res.status == 'success') {
              $('#form-register').trigger('reset');
              setTimeout(function() {
                window.location.href = $('#form-register').data('redirect');;
              }, 1000)
            }
          })


        }
      });

    });


  });
</script>