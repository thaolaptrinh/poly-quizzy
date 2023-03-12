<?php

return [

  [
    'id' => 1,
    'title' => 'Dashboard',
    'path' => __BASE_URL__ .  '/admin/home',
    'icon' => 'fas fa-tachometer-alt',
    'sub' => []
  ],


  [
    'id' => 2,
    'title' => 'Users',
    'path' => __BASE_URL__ .  '/admin/users',
    'icon' => 'fas fa-users',
  ],


  [
    'id' => 3,
    'title' => 'Quizzes',
    'path' => __BASE_URL__ .  '/admin/quizzes',
    'icon' => 'fas fa-thumbs-up',
    'sub' => [
      [
        'id' => 1,
        'title' => 'Topics',
        'path' => __BASE_URL__ .  '/admin/topics'
      ],
      // [
      //   'id' => 2,
      //   'title' => 'Questions',
      //   'path' => __BASE_URL__ .  '/admin/questions'
      // ]
    ]
  ],

  [
    'id' => 3,
    'title' => 'Logs',
    'path' => __BASE_URL__ .  '/admin/logs',
    'icon' => 'fas fa-history',
    'sub' => []

  ],

  [
    'id' => 99,
    'title' => 'Settings',
    'path' => __BASE_URL__ .  '/admin/settings',
    'icon' => 'fas fa-cog',
    'sub' => []

  ],
  [
    'id' => 999,
    'title' => 'Logout',
    'path' => __BASE_URL__ .  '/admin/auth/logout',
    'icon' => 'fas fa-arrow-right'

  ],



];
