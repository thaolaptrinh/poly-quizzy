<?php

use App\Core\Controller;

use App\Core\Model;

class Quiz extends Controller
{

  protected $model_home;
  public $data = [];

  public function __construct()
  {
    # code...
    $this->model_home = $this->model('client/QuizModel');
  }

  public function dataPlay()
  {
    # code...

    $data = $this->model_home->singleQuiz($_SESSION['code'] ?? '');

    $this->response($data['data']);
  }

  public function start()
  {
    # code...


    if ($_POST) {

      $requestData = $_POST['data'] ?? [];

      if (count($requestData) < 1) {

        $this->response([
          'status' => 'error',
          'msg' => 'Please select more than 5 topics to start quiz'
        ]);
      }

      $token = $_SESSION['login'] ?? '';

      $user =  $this->model_home->get_row(" SELECT * FROM `users` WHERE `token` = '$token' ");

      if (!$user) {
        $this->response([
          'status' => 'error',
          'msg' => 'Please login before start quiz',
          'redirect' => __BASE_URL__ . '/login'
        ]);
      }

      $questions = $this->model_home->questions($requestData, 3);

      $code = $this->model_home->createCode();

      $dataQuiz = [
        'code' =>  $code,
        'data' => json_encode($questions),
        "user_id" => $user['user_id'],
        'created_at' => get_time(),
      ];


      $createQuiz = $this->model_home->createQuiz($dataQuiz);

      if ($createQuiz) {

        $this->response([
          'status' =>  'success',
          'msg' => 'Start quiz',
          'redirect' => __BASE_URL__ . '/quiz?code=' . $code
        ]);
      }
    }
  }
}
