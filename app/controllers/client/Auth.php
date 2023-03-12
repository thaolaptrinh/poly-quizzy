<?php

use App\Core\Controller;

use App\Core\Model;

class Auth extends Controller
{



  public $data = [];


  public function __construct()
  {
    # code...

    $model = new Model();


    if (isset($_COOKIE["token"])) {
      $getUser = $model->get_row(" SELECT * FROM `users` WHERE `token` = '" . check_string($_COOKIE['token']) . "' ");
      if (!$getUser) {
        $this->logout();
      }
      $_SESSION['login'] = $getUser['token'];
      redirect(__BASE_URL__);
    }
  }


  public function is_login()
  {
    # code...
    if (!empty($_SESSION['login'])) {
      redirect(__BASE_URL__);
    }
  }

  public function logout()
  {
    # code...

    setcookie('token', '', -1, '/');
    session_destroy();
    header("location: " . __BASE_URL__ . '/login');
    exit;
  }

  public function login()
  {
    # code...

    $this->is_login();
    $this->data['title'] = 'Login';
    $this->data['content'] = 'client/login';
    $this->render('layouts/auth/client', $this->data);
  }

  public function register()
  {
    # code...
    $this->is_login();

    $this->data['title'] = 'Register';
    $this->data['content'] = 'client/register';
    $this->render('layouts/auth/client', $this->data);
  }


  public function request()
  {
    # code...

    $model = new Model();

    if (isset($_POST['type'])) {

      $requestData = $_POST;

      if ($_POST['type'] == 'register') {


        $checkNull = array_filter($requestData, 'myFilter');

        if ($checkNull) {
          die(json_encode([
            'status' => 'error',
            'msg' => 'Input empty'
          ]));
        }


        if (!filter_var($requestData['email'], FILTER_VALIDATE_EMAIL)) {
          die(json_encode([
            'status' => 'error',
            'msg' => 'Email invalid'
          ]));
        }

        if ($model->get_row("SELECT * FROM `users` WHERE `users`.`email` =  '" . $requestData['email'] . "'  ")) {
          die(json_encode([
            'status' => 'error',
            'msg' => 'Email exist'
          ]));
        }

        if (count_string($requestData['password']) < 8) {
          die(json_encode([
            'status' => 'error',
            'msg' => 'Password required min 8 length char'
          ]));
        }

        if ($requestData['confirm_password'] != $requestData['password']) {
          die(json_encode([
            'status' => 'error',
            'msg' => 'Required password match with Confirm password'
          ]));
        }

        unset($requestData['confirm_password']);
        unset($requestData['type']);

        $requestData['password'] = md5($requestData["password"]);

        $token = generate_token();
        $ip = get_client_ip();
        $created_at = get_time();

        $requestData = array_merge($requestData, [
          'token' => $token,
          'ip' => $ip,
          'created_at' => $created_at,
          'time_session'  => time(),

        ]);
        $register = $model->insert("users", $requestData);

        if ($register) {

          setcookie("token", $token, time() + $model->site('time_session'), "/");
          $_SESSION['login'] = $token;

          $model->insert("logs", [
            'user_id'       => $model->get_row("SELECT user_id FROM `users` WHERE `token` = '$token' ")['user_id'],
            'action'        => 'Register account',
            'ip'            => $ip,
            'device'        => $_SERVER['HTTP_USER_AGENT'],
            'created_at'    => $created_at,
          ]);

          die(json_encode([
            'status' => 'success',
            'msg' => 'Register successfully'
          ]));
        }


        die(json_encode([
          'status' => 'error',
          'msg' => 'Register failed, server error'
        ]));
      }



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

        setcookie("token", $token, time() + $model->site('time_session'), "/");
        $_SESSION['login'] = $token;


        die(json_encode([
          'status' => 'success',
          'msg' => 'Login successfully'
        ]));
      }
    }
  }
}
