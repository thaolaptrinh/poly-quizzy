<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary ">
      <div class="card-header">
        <h3 class="card-title">About</h3>
      </div>
      <div class="card-body box-profile">

        <h3 class="profile-username text-center"><?= $topic['topic_name'] ?></h3>

        <p class="text-muted text-center">Topic name</p>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Total questions</b> <a class="float-right">1,322</a>
          </li>
          <li class="list-group-item">
            <b>Created at</b> <a class="float-right"><?= $topic['created_at'] ?></a>
          </li>

          <li class="list-group-item">
            <b>Status</b> <a class="float-right"><?= $topic['topic_status'] ?></a>
          </li>

        </ul>

      </div>
    </div>

    <button data-toggle="modal" data-target="#modal-addQuestion" class="btn btn-info btn-block">
      <i class="fa fa-question" aria-hidden="true"></i>
      Add new question</button>

  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#questions" data-toggle="tab">Questions</a></li>
          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="questions">

            <?php foreach ($questions as $q) : extract($q) ?>
              <div class="post">
                <div class="user-block d-flex align-items-center">
                  <h5>
                    <?= $question_title ?>
                  </h5>

                  <button onclick="initDetail(<?= $q['id'] ?>)" data-toggle="modal" data-target="#modal-editQuestion" class="float-right btn-tool m-2 btn btn-primary"><i class="fas fa-edit"></i></button>
                  <button onclick="deleteRow(<?= $q['id'] ?>)" class="float-right btn-tool m-2 btn btn-danger"><i class="fas fa-times"></i></button>

                </div>
                <!-- /.user-block -->

                <ol type="A">

                  <?php
                  $qu = [
                    'answer_a' => $q['answer_a'],
                    'answer_b' => $q['answer_b'],
                    'answer_c' => $q['answer_c'],
                    'answer_d' => $q['answer_d']
                  ];
                  foreach ($qu as $key => $i) : if (!empty($i)) { ?>

                      <li><?= $i ?>
                        <?= $q['answer'] == $key ? ' <span class="badge-primary badge inline-block ml-4">TRUE</span>' : '' ?>
                      </li>

                  <?php }
                  endforeach; ?>

                </ol>
              </div>
            <?php endforeach; ?>

          </div>

          <div class="tab-pane" id="settings">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Topic name</label>
                  <input type="text" class="form-control" name="topic_name" value="<?= $topic['topic_name'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                  <select class="form-control" name="topic_status">
                    <option value="on" <?= $topic['topic_status'] == 'on' ? 'selected' : '' ?>>On</option>
                    <option value="off" <?= $topic['topic_status'] == 'off' ? 'selected' : '' ?>>Off</option>
                  </select>
                </div>

                <input type="hidden" name="topic_id" value="<?= $topic['topic_id'] ?>">
              </div>
              <div class="modal-footer justify-content-between">
                <button name="AddCategory" class="btn btn-primary btn-block" type="submit">Save</button>
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>


<div class="modal fade" id="modal-addQuestion">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add question</h4>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">

          <div class="form-group">
            <label for="exampleInputEmail1">Topic</label>
            <select class="form-control" name="topic_id">

              <?php foreach ($topics as $t) : ?>
                <option value="<?= $t['topic_id'] ?>" <?= $t['topic_id'] == $topic['topic_id'] ? 'selected' : '' ?>><?= $t['topic_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Question title</label>
            <textarea name="question_title" id="question_title" class="form-control"></textarea>
          </div>

          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Question a
                </label>
                <textarea name="answer_a" id="answer_a" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Question B</label>
                <textarea name="answer_b" id="answer_b" class="form-control"></textarea>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="">Question C</label>
                <textarea name="answer_c" id="answer_c" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Question D</label>
                <textarea name="answer_d" id="answer_d" class="form-control"></textarea>
              </div>
            </div>

          </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Question answer</label>
            <select class="form-control" name="answer">
              <option value="">Chose answer question</option>
              <option value="answer_a">A</option>
              <option value="answer_b">B</option>
              <option value="answer_c">C </option>
              <option value="answer_d">D </option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <select class="form-control" name="status">
              <option value="on">On</option>
              <option value="off">Off</option>
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button name="saveAdd" class="btn btn-primary btn-block" type="submit">Save</button>
          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>




<div class="modal fade" id="modal-editQuestion">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add question</h4>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">

          <div class="form-group">
            <label for="exampleInputEmail1">Topic</label>
            <select class="form-control" name="topic_id">
            </select>
          </div>
          <div class="form-group">
            <label for="">Question title</label>
            <textarea name="question_title_update" id="question_title_update" class="form-control"></textarea>
          </div>

          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Question a
                </label>
                <textarea name="answer_a_update" id="answer_a_update" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Question B</label>
                <textarea name="answer_b_update" id="answer_b_update" class="form-control"></textarea>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="">Question C</label>
                <textarea name="answer_c_update" id="answer_c_update" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Question D</label>
                <textarea name="answer_d_update" id="answer_d_update" class="form-control"></textarea>
              </div>
            </div>

          </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Question answer</label>
            <select class="form-control" name="answer_update">
              <option value="">Chose answer question</option>
              <option value="answer_a">A</option>
              <option value="answer_b">B</option>
              <option value="answer_c">C </option>
              <option value="answer_d">D </option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <select class="form-control" name="status_update">
              <option value="on">On</option>
              <option value="off">Off</option>
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button name="saveAdd" class="btn btn-primary btn-block" type="submit">Save</button>
          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
</div>




<script>
  function deleteRow(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {

        $.ajax({
          type: "POST",
          url: "<?= __BASE_URL__ . '/admin/question/delete' ?>",
          dataType: "json",
          data: {
            id: id
          },
          success: function(res) {
            if (res.status == 'success') {
              updateData();
            }
            Swal.fire({
              icon: res.status,
              text: res.msg,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ok',
              heightAuto: false
            });
          }
        });

      }
    })



  }


  let id_update = null;

  function initDetail(id) {

    id_update = id;
    $.ajax({
      type: "POST",
      url: "<?= __BASE_URL__ . '/admin/question/get_detail' ?>",
      dataType: "json",
      data: {
        id: id
      },
      success: function(res) {
        if (res) {
          $('[name="question_title_update"]').val(res.question_title)
          $('[name="answer_a_update"]').val(res.answer_a)
          $('[name="answer_b_update"]').val(res.answer_b)
          $('[name="answer_c_update"]').val(res.answer_c)
          $('[name="answer_d_update"]').val(res.answer_d)
          $('[name="status_update"]').val(res.status)
          $('[name="answer_update"]').val(res.answer)
        }

      }
    });



  }


  $(document).ready(function() {


    $('#modal-addQuestion form').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "<?= __BASE_URL__ . '/admin/question/save_add' ?>",
        data: {
          topic_id: $('#modal-addQuestion [name="topic_id"]').val(),
          question_title: $('[name="question_title"]').val(),
          answer_a: $('[name="answer_a"]').val(),
          answer_b: $('[name="answer_b"]').val(),
          answer_c: $('[name="answer_c"]').val(),
          answer_d: $('[name="answer_d"]').val(),
          answer: $('[name="answer"]').val(),
          status: $('[name="status"]').val(),
        },
        dataType: "json",
        success: function(res) {
          console.log("🚀 ~ file: advantage.php:219 ~ $ ~ res:", res)
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

              $('#modal-addQuestion form').trigger('reset');
              $('#modal-addQuestion').modal('hide');

            }
          })
        }
      });

    });


    $('#settings form').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "<?= __BASE_URL__ . '/admin/topics/save_edit' ?>",
        data: {
          topic_id: $('[name="topic_id"]').val(),
          topic_name: $('[name="topic_name"]').val(),
          topic_status: $('[name="topic_status"]').val(),
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
          }).then((result) => {})
        }
      });

    });
  });
</script>