<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? null ?> | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/fontawesome-free/css/all.min.css" ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/icheck-bootstrap/icheck-bootstrap.min.css" ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= __BASE_URL__ .  "/assets/public/AdminLTE3/plugins/jqvmap/jqvmap.min.css" ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= __BASE_URL__ . "/assets/public/AdminLTE3/dist/css/adminlte.min.css" ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/daterangepicker/daterangepicker.css" ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/summernote/summernote-bs4.min.css" ?>">

  <!-- jQuery -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/jquery/jquery.min.js " ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/jquery-ui/jquery-ui.min.js " ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= __BASE_URL__ . '/public/logo.png' ?>" alt="" >
    </div> -->

    <!-- Navbar -->
    <?php $this->render('admin/nav'); ?>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <?php $this->render('admin/sidebar'); ?>

    <!-- /.Sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title ??  null ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= __BASE_URL__ . '/admin' ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $title ??  null ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->


      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <?php $this->render($content, $sub_content ?? []); ?>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>


    <!-- /.content-wrapper -->
    <footer class=" main-footer">
      <strong>Copyright &copy; 2021-2022 <a href="<?= __BASE_URL__ ?>">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- Bootstrap 4 -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js " ?>"></script>
  <!-- ChartJS -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/chart.js/Chart.min.js " ?>"></script>
  <!-- Sparkline -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/sparklines/sparkline.js " ?>"></script>
  <!-- JQVMap -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/jqvmap/jquery.vmap.min.js " ?>"></script>
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/jqvmap/maps/jquery.vmap.usa.js " ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/jquery-knob/jquery.knob.min.js " ?>"></script>
  <!-- daterangepicker -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/moment/moment.min.js" ?>"></script>
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/daterangepicker/daterangepicker.js" ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js" ?>">
  </script>
  <!-- Summernote -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/summernote/summernote-bs4.min.js" ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js" ?>">
  </script>
  <!-- AdminLTE App -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/dist/js/adminlte.js" ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/dist/js/demo.js" ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/dist/js/pages/dashboard.js" ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>