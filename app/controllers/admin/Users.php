<?php

use App\Core\Controller;

class Users extends Controller
{


  public $data = [];

  public function __construct()
  {
    # code...
    $model = $this->model('admin/HomeModel');

    if (!isset($_SESSION['admin_login'])) {
      redirect(__BASE_URL__ . '/admin/login');
    } else {
      $getUser = $model->get_row(" SELECT * FROM `users` WHERE `role` = 'admin' AND `token` = '" . check_string($_SESSION['admin_login']) . "'  ");
      if (!$getUser) {
        redirect(__BASE_URL__ . '/admin/login');
      }
    }
  }

  public function list(): string
  {
    # code...
    $model = $this->model('admin/UserModel');
    $list = $model->listUser();
    $this->response(['data' => $list]);
  }


  public function new()
  {
    # code...
    $this->data['content'] = 'admin/users/new';
    $this->render('layouts/admin', $this->data);
  }

  public function edit($id)
  {
    # code...

    $model = $this->model('admin/UserModel');
    $this->data['sub_content']['user'] = $model->detailUser($id);
    $this->data['sub_content']['logs'] = $model->logsUser($id);
    if (!empty($this->data['sub_content']['user'])) {
      $this->data['content'] = 'admin/users/edit';
      $this->data['title'] = 'Edit user';
      $this->render('layouts/admin', $this->data);
    }
  }

  public function save_edit($id)
  {
    # code...

    $model = $this->model('admin/UserModel');
    $user = $model->detailUser($id);

    if (!empty($user)) {

      if ($_POST) {

        $requestData = $_POST;
        if (empty($requestData['password'])) {
          $requestData['password'] = $user['password'];
        } else {
          if (count_string($requestData['password']) < 8) {
            die(json_encode([
              'status' => 'error',
              'msg' =>  'Password length >= 8',
            ]));
          }
          $requestData['password'] = md5($requestData['password']);
        }

        $requiredData = [
          $requestData['first_name'],
          $requestData['last_name'],
          $requestData['email'],
          $requestData['password'],
          $requestData['token'],
        ];

        $checkNull = array_filter($requiredData, 'myFilter');

        if ($checkNull) {
          die(json_encode([
            'status' => 'error',
            'msg' =>  'Empty input',
          ]));
        }


        if (!check_email($requestData['email'])) {
          die(json_encode([
            'status' => 'error',
            'msg' => 'Email invalid'
          ]));
        }


        if ($user['email'] != $requestData['email']) {
          $checkEmail = $model->get_row("SELECT * FROM `users` WHERE `users`.`email` = '" . $requestData['email'] . "' ");
          if (!empty($checkEmail)) {
            die(json_encode([
              'status' => 'error',
              'msg' => 'Email account exist'
            ]));
          }
        }

        $update = $model->update('users', $requestData, "user_id='" . $id . "'");

        if ($update) {
          die(json_encode([
            'status' => 'success',
            'msg' => 'Edit successfully'
          ]));
        }

        die(json_encode([
          'status' => 'error',
          'msg' => 'Edit error or server error'
        ]));
      }
    }
  }

  public function save_add()
  {
    # code...

    $model = $this->model('admin/UserModel');

    if ($_POST) {

      $requestData = $_POST;


      $requiredData = [
        $requestData['first_name'],
        $requestData['last_name'],
        $requestData['email'],
        $requestData['password'],
        $requestData['token'],
      ];

      $checkNull = array_filter($requiredData, 'myFilter');

      if ($checkNull) {
        die(json_encode([
          'status' => 'error',
          'msg' =>  'Empty input',
        ]));
      }


      if (!check_email($requestData['email'])) {
        die(json_encode([
          'status' => 'error',
          'msg' => 'Email invalid'
        ]));
      }

      $checkEmail = $model->get_row("SELECT * FROM `users` WHERE `users`.`email` = '" . $requestData['email'] . "' ");
      if (!empty($checkEmail)) {
        die(json_encode([
          'status' => 'error',
          'msg' => 'Email account exist'
        ]));
      }

      if (count_string($requestData['password']) < 8) {
        die(json_encode([
          'status' => 'error',
          'msg' =>  'Password length >= 8',
        ]));
      }


      $requestData['password'] = md5($requestData['password']);
      $requiredData['created_by'] = 'admin';

      $add = $model->insert('users', $requestData);

      if ($add) {
        die(json_encode([
          'status' => 'success',
          'msg' => 'Add successfully'
        ]));
      }

      die(json_encode([
        'status' => 'error',
        'msg' => 'Add error or server error'
      ]));
    }
  }

  public function delete()
  {
    # code...


    if (!empty($_POST['id'])) {


      $id = $_POST['id'];

      $model = $this->model('admin/UserModel');

      $data = $model->detailUser($id);

      if (!$data) {
        die(json_encode([
          'status' => 'error',
          'msg' => 'ID invalid'
        ]));
      }

      if ($data['role'] == 'admin') {
        die(json_encode([
          'status' => 'error',
          'msg' => "Can't delete admin account"
        ]));
      }

      $delete = $model->remove('users', "user_id = '" . $id . "'");

      if ($delete) {

        die(json_encode([
          'status' => 'success',
          'msg' => 'Delete successfully'
        ]));
      }

      die(json_encode([
        'status' => 'error',
        'msg' => 'Delete error or server error'
      ]));
    }
    die(json_encode([
      'status' => 'error',
      'msg' => 'ID invalid'
    ]));
  }
}
