<div class="form-login">

  <form action="" method="post" id="form-login" data-redirect="<?= __BASE_URL__ ?>">
    <div class="mb-3 form-field">
      <label for="Email">Email</label>
      <input type="text" name="email" id="Email" class="form-input" placeholder="">
    </div>

    <div class="mb-3 form-field">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-input" placeholder="">
    </div>

    <div class="flex justify-between">
      <div class="form-checkbox relative">
        <input type="checkbox" name="remember" checked="checked">
        Remember
        <span class="checkmark"></span>
      </div>
      <a href="<?= __BASE_URL__ . '/forgot-password' ?>" class="text-[13px] font-normal">Forgot Password?</a>
    </div>

    <div class="flex gap-5 mt-[50px]">
      <button type="submit" class="button button--primary">Login</button>
      <a href="<?= __BASE_URL__ . '/register' ?>" class="button button--normal">Signup</a>
    </div>

  </form>
</div>


<script>
  $(document).ready(function() {

    $('#form-login').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "<?= __BASE_URL__ . '/client/auth/request' ?>",
        data: {
          type: 'login',
          email: $('[name="email"]').val(),
          password: $('[name="password"]').val(),
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
              $('#form-login').trigger('reset');
              setTimeout(function() {
                window.location.href = $('#form-login').data('redirect');;
              }, 1000)
            }
          })


        }
      });

    });


  });
</script>