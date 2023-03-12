<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= __BASE_URL__ . '/admin' ?>" class="h1"><b>Admin</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post" id="form-login" data-redirect="<?= __BASE_URL__ . '/admin' ?>">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>




<script>
  $(document).ready(function() {

    $('#form-login').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "<?= __BASE_URL__ . '/admin/auth/request' ?>",
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
            confirmButtonText: 'Ok',
            heightAuto: false
          }).then((result) => {
            if (result.isConfirmed && res.status == 'success') {
              setTimeout(function() {
                window.location.href = $('#form-login').data('redirect');
              }, 1000)
            }
          })


        }
      });

    });


  });
</script>