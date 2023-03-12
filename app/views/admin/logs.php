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
          <th>Email</th>
          <th>Action</th>
          <th>Time</th>
          <th>IP</th>
          <th>Device</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($data as $d) : extract($d); ?>
          <tr>
            <td><?= $id ?></td>
            <td><?= $email ?></td>
            <td><?= $action ?></td>
            <td><?= $created_at ?></td>
            <td><?= $ip ?></td>
            <td><?= $device ?></td>

          </tr>
        <?php endforeach; ?>

      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Email</th>
          <th>Action</th>
          <th>Time</th>
          <th>IP</th>
          <th>Device</th>
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


<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>