<div class="row">
  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total user</span>
        <span class="info-box-number"> <?= $total['all'] ?> user</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-eye"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Users active</span>
        <span class="info-box-number"><?= $total['active'] ?> user</span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-lock"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Users disabled</span>
        <span class="info-box-number">
          <?= $total['disabled'] ?> user
        </span>
      </div>
    </div>
  </div>
  <section class="col-lg-12 connectedSortable">
    <div class="card card-primary card-outline">
      <div class="card-header ">
        <h3 class="card-title">
          <i class="fas fa-users mr-1"></i>
          List users
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
      <div class="card-body">
        <form action="" id="form" method="post">
          <div class="row mb-2">

            <div class="col-sm-6 offset-6">
              <a href="<?= __BASE_URL__ . '/admin/users/new' ?>" class="float-right btn btn-primary btn-sm"><i class="fas fa-trash mr-1"></i>Add new</a>
              <!-- <button class="float-right btn btn-primary btn-sm mr-1" type="button" onclick="" name="btn_new"><i class="fas fa-trash mr-1"></i>Delete</button> -->
            </div>

          </div>
          <div class="table-responsive p-0">
            <table id="datatable1" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th width="5px;"><input type="checkbox" name="check_all" id="check_all" value="option1"></th>
                  <th>Account</th>
                  <th>Security</th>
                  <th>Action</th>
                </tr>
              </thead>

            </table>
          </div>
      </div>
      </form>
    </div>
  </section>
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



<script type="text/javascript">
  function updateData() {
    $('#datatable1').DataTable().ajax.reload();
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
          url: "<?= __BASE_URL__ . '/admin/users/delete/' ?>",
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


  $(document).ready(function() {

    $('#datatable1').DataTable({
      "retrieve": true,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      ajax: "<?= __BASE_URL__ . '/admin/users/list' ?>",

      columns: [

        {
          data: 'user_id',
          render: function(user_id) {
            return `<td><input type="checkbox" data-id="${user_id}" name="checkbox" class="checkbox" value=""></td>`
          }
        },
        {

          data: 'first_name',
          render: function(data, type, row) {

            const status = {
              on: 'success',
              off: 'danger'
            };

            return `
                <ul>
                <li>Full name: ${row.first_name + ' ' + row.last_name} </li>
                <li>Email: ${row.email}</li>
                <li>Status: <span class="badge-btn badge-${status[row.status]}">${row.status}</span></li>
              </ul>
            `
          }

        },
        {
          data: 'ip',
          render: function(data, type, row) {
            return `
                  <ul>
                    <li>IP: <b>${row.ip}</b></li>
                    <li>Created_at: <b>${row.created_at}</b></li>
                  </ul>
            `
          }
        },
        {
          data: 'user_id',
          render: function(user_id) {
            return `
                     <a href="<?= __BASE_URL__ . "/admin/users/edit/" ?>${user_id}" style="color:white;" class="btn btn-info btn-sm btn-icon-left m-b-10" type="button">
                        <i class="fas fa-edit mr-1"></i><span class="">Edit</span>
                      </a>
                      <button style="color:white;" onclick="deleteRow(${user_id})" class="btn btn-danger btn-sm btn-icon-left m-b-10" type="button">
                        <i class="fas fa-trash mr-1"></i><span class="">Delete</span>
                      </button>
                    </td>`
          }
        }
      ],
    }).buttons().container().appendTo('#datatable1_wrapper .col-md-6:eq(0)');







    $('#check_all').on('click', function() {
      if (this.checked) {
        $('.checkbox').each(function() {
          this.checked = true;
        });
      } else {
        $('.checkbox').each(function() {
          this.checked = false;
        });
      }
    });
    $('.checkbox').on('click', function() {
      if ($('.checkbox:checked').length == $('.checkbox').length) {
        $('#check_all').prop('checked', true);
      } else {
        $('#check_all').prop('checked', false);
      }
    });
  });
</script>