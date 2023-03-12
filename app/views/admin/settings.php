<div class="row">
  <section class="col-lg-12">
    <div class="card card-dark card-tabs">
      <div class="card-header p-0 pt-1 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#tab-general" role="tab" aria-controls="tab-general" aria-selected="true">General</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#tab-auto-mail" role="tab" aria-controls="tab-mail" aria-selected="false">Mail</a>
          </li>

        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-three-tabContent">
          <div class="tab-pane fade show active" id="tab-general" role="tabpanel" aria-labelledby="tab-general">
            <form action="" method="POST">
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $data['title'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control" name="description" value="<?= $data['description'] ?>">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Keywords</label>
                    <input type="text" class="form-control" name="keywords" value="<?= $data['keywords'] ?>">
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2bs4" name="status">
                      <option value="on" <?= $data['status']  !== 'on' ?: 'selected' ?>>ON
                      </option>
                      <option value="off" <?= $data['status']  !== 'off' ?: 'selected' ?>>
                        OFF
                      </option>
                    </select>

                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Status Captcha</label>
                    <select class="form-control select2bs4" name="status_captcha">
                      <option value="on" <?= $data['status_captcha']  !== 'on' ?: 'selected' ?>>ON
                      </option>
                      <option value="off" <?= $data['status_captcha']  !== 'off' ?: 'selected' ?>>
                        OFF
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Time session</label>
                    <input type="number" class="form-control" name="time_session" value="10000000" placeholder="Time session">
                  </div>
                </div>

              </div>
              <button name="SaveSettings" class="btn btn-info btn-icon-left m-b-10" type="submit"><i class="fas fa-save mr-1"></i>Save</button>
            </form>
          </div>
          <div class="tab-pane fade" id="tab-mail" role="tabpanel" aria-labelledby="tab-mail">

          </div>

        </div>
      </div>
    </div>
  </section>
</div>
</div>


<script>
  $(document).ready(function() {


    const general = document.querySelector('#tab-general')
    const formGeneral = general.querySelector('form')


    formGeneral.addEventListener('submit', function(e) {
      e.preventDefault();

    
      $.ajax({
        type: "POST",
        url: "<?= __BASE_URL__ . '/admin/settings/general' ?>",
        data: {
          title: $('[name="title"]').val(),
          description: $('[name="description"]').val(),
          status: $('[name="status"]').val(),
          status_captcha: $('[name="status_captcha"]').val(),
          keywords: $('[name="keywords"]').val(),
          time_session: $('[name="time_session"]').val(),
        },
        dataType: "json",
        success: function(res) {
          Swal.fire({
            icon: res.status,
            title: 'Msg...',
            text: res.msg,
          })

        }
      });

    })



  })
</script>