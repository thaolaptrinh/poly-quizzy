<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? null ?> | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/fontawesome-free/css/all.min.css " ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/icheck-bootstrap/icheck-bootstrap.min.css" ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= __BASE_URL__ . "/assets/public/AdminLTE3/dist/css/adminlte.min.css " ?>">
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/jquery/jquery.min.js " ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">

  <?php $this->render($content, $sub_content ?? [ ]); ?>

  <!-- jQuery -->
  <!-- Bootstrap 4 -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js" ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/dist/js/adminlte.min.js" ?>"></script>
</body>

</html>