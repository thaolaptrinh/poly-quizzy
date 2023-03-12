<div class="row">
  <section class="col-lg-6">
    <div class="mb-3">
      <a class="btn btn-danger btn-icon-left m-b-10" href="<?= __BASE_URL__ . '/admin/users' ?>" type="button"><i class="fas fa-undo-alt mr-1"></i>Quay Lại</a>
    </div>
  </section>
  <section class="col-lg-6">
  </section>
  <section class="col-lg-12 connectedSortable">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-user-edit mr-1"></i>
          Add user
        </h3>
        <div class="card-tools">
          <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i class="fas fa-expand"></i>
          </button>
          <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <form action="" method="POST" id="form-add">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>First name (*)</label>
                <input type="text" class="form-control" name="first_name">

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Last name (*)</label>
                <input type="text" class="form-control" name="last_name">
              </div>
            </div>

          </div>

          <div class="form-group">
            <label>Email (*)</label>
            <input type="email" class="form-control" name="email">
          </div>
          <div class="form-group">
            <label>Token (*)</label>
            <input type="text" class="form-control" name="token">

          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Mật khẩu (*)</label>
                <input type="text" class="form-control" placeholder="**********" name="password">

              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Role (*)</label>
                <select class="form-control select2bs4" name="role">
                  <option value="user">User
                  </option>
                  <option value="admin">Admin
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="form-group">
                  <label>Status (*)</label>
                  <select class="form-control select2bs4" name="status">
                    <option value="on">ON
                    </option>
                    <option value="off">OFF
                    </option>
                  </select>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="card-footer clearfix">
          <button aria-label="" class="btn btn-info btn-icon-left m-b-10" type="submit"><i class="fas fa-save mr-1"></i>Save</button>
        </div>
      </form>
    </div>
  </section>
</div>


<script>
  $(document).ready(function() {

    $('#form-add').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "post",
        url: "<?= __BASE_URL__ . '/admin/users/save_add' ?>",
        data: {
          first_name: $('[name="first_name"]').val(),
          last_name: $('[name="last_name"]').val(),
          email: $('[name="email"]').val(),
          password: $('[name="password"]').val(),
          token: $('[name="token"]').val(),
          role: $('[name="role"]').val(),
          status: $('[name="status"]').val(),
        },
        dataType: "json",
        success: function(res) {
          Swal.fire({
            icon: res.status,
            title: 'Msg...',
            text: res.msg,
          }).then((result) => {
            if (result.isConfirmed & res.status == 'success') {

              $('#form-add').trigger("reset");

            }
          })
        }
      });
    });

  });
</script>