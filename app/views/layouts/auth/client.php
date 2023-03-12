<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? null ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= __BASE_URL__ . '/assets/client/css/output.css' ?>">

  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/jquery/jquery.min.js " ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>



  <div class="max-w-[1440px] mx-auto ">

    <div class="layout-container">
      <div class="grid md:grid-cols-2 justify-center items-center gap-x-3 h-screen">

        <div class="p-[15px] p-md-[30px]">

          <a href="<?= __BASE_URL__ ?>">
            <img class="mx-auto" src="<?= __BASE_URL__ . '/public/logo-large.png' ?>" alt="Logo">
          </a>

          <div class="text-[20px] text-center text-[rgba(0, 0, 0, 0.6)] mt-[50px] mb-[30px]">
            Welcome back!
            <br>
            Please login/Signup to your account.
          </div>

          <?php $this->render($content, $sub_content ?? []); ?>

        </div>


        <div class="md:block hidden mx-auto">
          <img src="<?= __BASE_URL__ . '/public/auth.png' ?>" alt="">
        </div>

      </div>
    </div>


  </div>


</body>

</html>