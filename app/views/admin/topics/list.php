<div class="row">
  <section class="col-lg-6">
  </section>
  <section class="col-lg-6 text-right">
    <div class="mb-3">
      <button class="btn btn-primary btn-icon-left m-b-10" data-toggle="modal" data-target="#modal-addTopic" type="button">
        <i class="fas fa-plus-circle mr-1"></i>
        Add new topic
      </button>
    </div>
  </section>
</div>
<div class="card card-primary card-outline">
  <div class="card-header">
    <div class="card-header ui-sortable-handle " style="cursor: move;">
      <h3 class="card-title">
        <i class="fas fa-history mr-1"></i>
        Logs
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

  </div>

  <div class="card-body">

    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>


<link rel="stylesheet" href="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" ?>" />
<link rel="stylesheet" href="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" ?>" />
<link rel="stylesheet" href="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" ?>" />

<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables/jquery.dataTables.min.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-responsive/js/dataTables.responsive.min.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-buttons/js/dataTables.buttons.min.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/jszip/jszip.min.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/pdfmake/pdfmake.min.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/pdfmake/vfs_fonts.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-buttons/js/buttons.html5.min.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-buttons/js/buttons.print.min.js" ?>"></script>
<script src="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/datatables-buttons/js/buttons.colVis.min.js" ?>"></script>






<div class="modal fade" id="modal-addTopic">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add topic</h4>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Topic name</label>
            <input type="text" class="form-control" name="topic_name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <select class="form-control" name="topic_status">
              <option value="on">On</option>
              <option value="off">Off</option>
            </select>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button name="AddCategory" class="btn btn-primary btn-block" type="submit">Save</button>
          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-editTopic">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit topic</h4>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Topic name</label>
            <input type="text" class="form-control" name="topic_name_update">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <select class="form-control" name="topic_status_update">
              <option value="on">On</option>
              <option value="off">Off</option>
            </select>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button name="AddCategory" class="btn btn-primary btn-block" type="submit">Save</button>
          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<script>
  function updateData() {
    $('#example1').DataTable().ajax.reload();
  }


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
          url: "<?= __BASE_URL__ . '/admin/topics/delete/' ?>",
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
      url: "<?= __BASE_URL__ . '/admin/topics/get_detail' ?>",
      dataType: "json",
      data: {
        id: id
      },
      success: function(res) {
        if (res) {
          $('[name="topic_name_update"]').val(res.topic_name)
          $('[name="topic_status_update"]').val(res.topic_status)
        }

      }
    });



  }

  $(document).ready(function() {

    $('#example1').DataTable({
      "retrieve": true,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      ajax: "<?= __BASE_URL__ . '/admin/topics/list' ?>",
      columns: [{
          data: 'topic_id'
        },
        {
          data: 'topic_name'
        },

        {
          data: 'topic_status',
          render: function(status) {

            const type = {
              'on': 'success',
              'off': 'danger'
            };

            return `<span class="badge-btn badge-${type[status]}">${status}</span>`
          }
        },
        {
          data: 'topic_id',
          render: function(id) {
            return `
            <button data-toggle="modal" onclick="initDetail(${id})" data-target="#modal-editTopic" style="color:white;" class="btn btn-info btn-sm btn-icon-left m-b-10" type="button">
                <i class="fas fa-edit mr-1"></i><span class="">Edit</span>
              </button>
              <button style="color:white;" onclick="deleteRow(${id})" class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
                <i class="fas fa-trash mr-1"></i><span class="">Delete</span>
              </button>
              <a href="<?= __BASE_URL__ . '/admin/topics/advantage/' ?>${id}" class="btn btn-primary">Advantaged</a>
              `
          }
        }
      ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    $('#modal-addTopic form').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "<?= __BASE_URL__ . '/admin/topics/save_add' ?>",
        data: {
          topic_name: $('[name="topic_name"]').val(),
          topic_status: $('[name="topic_status"]').val(),
        },
        dataType: "json",
        success: function(res) {
          if (res.status == 'success') {
            updateData();
            $('[name="topic_name"]').val("")
          }
          Swal.fire({
            icon: res.status,
            title: 'Msg...',
            text: res.msg,
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok',
            heightAuto: false
          }).then((result) => {
            if (result.isConfirmed) {
              $('#modal-addTopic').modal('hide');
            }
          })
        }
      });

    });


    $('#modal-editTopic form').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "<?= __BASE_URL__ . '/admin/topics/save_edit' ?>",
        data: {
          topic_id: id_update,
          topic_name: $('[name="topic_name_update"]').val(),
          topic_status: $('[name="topic_status_update"]').val(),
        },
        dataType: "json",
        success: function(res) {

          if (res.status == 'success') {
            updateData();
          }

          Swal.fire({
            icon: res.status,
            title: 'Msg...',
            text: res.msg,
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok',
            heightAuto: false
          }).then((result) => {


            if (result.isConfirmed) {
              $('#modal-editTopic').modal('hide');
            }
          })
        }
      });

    });


  });
</script>