<?php

use App\Core\Controller;
use App\Core\Model;

class Auth extends  Controller
{

  public $data = [];


  public function is_login()
  {
    # code...

    $model  = new Model();

    if (!empty($_SESSION['admin_login'])) {
      $getUser = $model->get_row(" SELECT * FROM `users` WHERE `role` = 'admin' AND `token` = '" . check_string($_SESSION['admin_login']) . "'  ");
      if ($getUser) {
        redirect(__BASE_URL__ . '/admin');
      }
    }
  }

  public function login()
  {
    # code...

    $this->is_login();
    $this->data['title'] = 'Login';
    $this->data['content'] = 'admin/login';
    $this->render('layouts/auth/admin', $this->data);
  }

  public function logout()
  {
    # code...
    // session_destroy();
    unset($_SESSION['admin_login']);
    setcookie('token', '', -1, '/');
    header('location:' . __BASE_URL__ . '/admin/login');
    exit;
  }

  public function request()
  {
    # code...

    $model = new Model();

    if (isset($_POST['type'])) {

      $requestData = $_POST;


      if ($_POST['type'] == 'login') {

        $checkNull = array_filter($requestData, 'myFilter');

        if ($checkNull) {
          die(json_encode([
            'status' => 'error',
            'msg' => 'Input empty'
          ]));
        }


        $dataUser = $model->get_row("SELECT * FROM `users` WHERE `users`.`email` =  '" . $requestData['email'] . "'");

        if (!$dataUser) {
          die(json_encode([
            'status' => 'error',
            'msg' => 'Email invalid'
          ]));
        }

        if ($dataUser['role'] != 'admin') {
          die(json_encode([
            'status' => 'error',
            'msg' => 'Required role is admin'
          ]));
        }


        $requestData['password'] = md5($requestData["password"]);


        if ($dataUser['password'] != $requestData['password']) {

          die(json_encode([
            'status' => 'error',
            'msg' => 'Password invalid'
          ]));
        }

        $token = generate_token();
        $ip = get_client_ip();
        $created_at = get_time();
        $user_id = $dataUser['user_id'];

        $model->insert("logs", [
          'user_id'       => $user_id,
          'action'        => 'Login account',
          'ip'            => $ip,
          'device'        => $_SERVER['HTTP_USER_AGENT'],
          'created_at'    => $created_at,
        ]);

        $model->update("users", [
          'ip'        => $ip,
          'time_request' => time(),
          'time_session' => time(),
          'token'     => $token
        ], " `user_id` = '$user_id' ");

        // setcookie("token", $token, time() + $model->site('time_session'), "/");
        $_SESSION['admin_login'] = $token;


        die(json_encode([
          'status' => 'success',
          'msg' => 'Login successfully'
        ]));
      }
    }
  }
}
