<?php

use App\Core\Controller;
use App\Core\Model;

class Home extends Controller
{


  public $data = [];

  public function __construct()
  {
    # code...

    $model = new Model();

    $this->data['user'] = null;




    if (isset($_COOKIE["token"])) {
      $getUser = $model->get_row(" SELECT * FROM `users` WHERE `token` = '" . $_COOKIE['token'] . "' ");
      if (!$getUser) {
        redirect(__BASE_URL__ . '/client/auth/logout');
      }
      $_SESSION['login'] = $getUser['token'];

      $this->data['user'] = $getUser;
    }



    if (!empty($_SESSION['login'])) {

      $getUser = $model->get_row(" SELECT * FROM `users` WHERE `token` = '" . $_SESSION['login'] . "'  ");

      if (empty($getUser)) {
        $this->data['user'] = null;
      }
      $this->data['user'] = $getUser;
    }
  }

  public function is_login()
  {
    # code...
    if (empty($_SESSION['login'])) {
      redirect(__BASE_URL__ . '/login');
    }
  }

  public function index()
  {
    # code...

    $this->data['title'] = 'Quiz Home';
    $this->data['content'] = 'client/index';
    $this->render('layouts/client', $this->data);
  }

  public function quiz()
  {
    # code...

    $this->is_login();

    $code = $_GET['code'] ?? '';

    $model  = $this->model('client/QuizModel');
    if (!empty(check_string($code))) {
      $_SESSION['code'] = $code;
      $quiz = $model->singleQuiz(check_string($code));
      if ($quiz) {
        $this->data['content'] = 'client/quiz';
        $this->data['title'] = 'Start Quiz';
        $this->render('layouts/client', $this->data);
      } else {
        redirect(__BASE_URL__);
      }
    } else {
      redirect(__BASE_URL__);
    }
  }
}
