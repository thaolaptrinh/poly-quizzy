<?php $sidebar = require __DIR_ROOT__ . '/configs/admin/sidebar.php'; ?>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= __BASE_URL__ . '/admin' ?>" style="display: block; text-align: center">
    <img src="<?= __BASE_URL__ . '/public/logo.png' ?>" style="width: 200px;">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">




    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php

        foreach ($sidebar as $li) {
          extract($li); ?>

          <li class="nav-item ">
            <a href="<?= $path ?>" class="nav-link">
              <i class="nav-icon <?= $icon ?>"></i>
              <p>
                <?= $title ?>

                <?= !empty($sub) ? '<i class="fas fa-angle-left right"></i>' : '' ?>
              </p>
            </a>

            <?php if (!empty($sub)) { ?>
              <ul class="nav nav-treeview">
                <?php foreach ($sub as $s) { ?>

                  <li class="nav-item">
                    <a href="<?= $s['path'] ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p><?= $s['title'] ?></p>
                    </a>
                  </li>

                <?php } ?>
              </ul>

            <?php } ?>


          </li>

        <?php } ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>