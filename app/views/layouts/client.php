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
  <link rel="stylesheet" href="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/fontawesome-free/css/all.min.css" ?>" />
  <script src="<?= __BASE_URL__ . "/assets/public/AdminLTE3/plugins/jquery/jquery.min.js " ?>"></script>
</head>

<body>

  <div class="max-w-[1440px] mx-auto ">

    <div class="layout-container">

      <header>
        <div class="grid grid-flow-col justify-between mt-[30px] mb-[15px]">
          <a href="<?= __BASE_URL__ ?>"> <img src="<?= __BASE_URL__  . '/public/logo.png' ?>" alt=""></a>
          <nav class="grid gap-x-[50px] grid-flow-col items-center">
            <ul class="gap-x-[20px] grid-flow-col items-center hidden md:grid">
              <li><a href="#">How it works?</a></li>
              <li><a href="#">Features</a></li>
              <li><a href="#">About us</a></li>
            </ul>

            <?php if ($user) { ?>
              <div class="text-[#fcc822]">
                <i class="fas fa-user-alt" style="margin-right: 5px;"></i><?= $user['last_name'] ?>
                <i class="fa fa-caret-down" aria-hidden="true"></i>
                <a href="<?= __BASE_URL__  . '/client/auth/logout' ?>">Logout</a>
              </div>

            <?php } else { ?>
              <a href="<?= __BASE_URL__ . '/login' ?>" class="button button--normal">Login</a>
            <?php } ?>

          </nav>
        </div>
        <hr class="border-[#ECECE8] border-solid border-[0.7px]">
      </header>

      <section>
        <?php $this->render($content, $sub_content ?? []); ?>
      </section>

    </div>


  </div>


</body>

</html>