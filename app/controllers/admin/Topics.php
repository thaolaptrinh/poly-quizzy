<?php

use App\Core\Controller;

use App\Core\Model;



class Topics extends Controller
{


  public $data = [];

  protected $model_home;



  public function __construct()
  {
    # code...
    $this->model_home = $this->model('TopicModel');
  }


  public function requiredAdmin()
  {
    # code...
    $this->model_home = $this->model('TopicModel');

    $model = new Model();

    if (!isset($_SESSION['admin_login'])) {
      $this->response(['status' => 'error', 'msg' => "Don't allow request"]);
    } else {
      $getUser = $model->get_row(" SELECT * FROM `users` WHERE `role` = 'admin' AND `token` = '" . check_string($_SESSION['admin_login']) . "'  ");
      if (!$getUser) {
        $this->response(['status' => 'error', 'msg' => "Don't allow request"]);
      }
    }
  }

  public function advantage($id)
  {
    # code...
    $this->requiredAdmin();

    $model = $this->model('TopicModel');
    $question = $this->model('QuestionModel');

    $detail = $model->detailTopic($id);
    $topics = $model->listTopic();

    if (!empty($detail)) {
      $this->data['sub_content']['topic'] = $detail;
      $this->data['sub_content']['topics'] = $topics;
      $this->data['sub_content']['questions'] = $question->listQuestion($id);
      $this->data['title'] = 'Advantage topic';
      $this->data['content'] = 'admin/topics/advantage';
      $this->render('layouts/admin', $this->data);
    } else {
      redirect(__BASE_URL__ . '/admin/topics');
    }
  }


  public function list(): string
  {
    # code...
    $this->response(['data' => $this->model_home->listTopic()]);
  }


  public function save_add()
  {
    # code...

    $this->requiredAdmin();

    if ($_POST) {

      $requestData  = $_POST;

      $checkNull = array_filter($requestData, 'myFilter');

      if ($checkNull) {
        die(json_encode([
          'status' => 'error',
          'msg' => 'Input empty'
        ]));
      }

      $requestData['created_at'] = get_time();

      $create = $this->model_home->addTopic($requestData);

      if ($create) {
        die(json_encode([
          'status' => 'success',
          'msg' => 'Add new successfully'
        ]));
      }

      die(json_encode([
        'status' => 'error',
        'msg' => 'Add error or server error'
      ]));
    }
  }

  public function get_detail()
  {
    # code...
    $this->requiredAdmin();

    if (!empty($_POST['id'])) {
      $id = $_POST['id'];
      $detail = $this->model_home->detailTopic($id);
      $this->response($detail);
    }

    die(json_encode([
      'status' => 'error',
      'msg' => 'ID invalid'
    ]));
  }

  public function save_edit()
  {
    # code...
    $this->requiredAdmin();

    if ($_POST) {

      $requestData  = $_POST;

      $checkNull = array_filter($requestData, 'myFilter');

      if ($checkNull) {
        die(json_encode([
          'status' => 'error',
          'msg' => 'Input empty'
        ]));
      }

      $id = $requestData['topic_id'];

      unset($requestData['topic_id']);

      $detail = $this->model_home->detailTopic($id);

      if ($detail) {

        $update = $this->model_home->updateTopic($requestData, $id);

        if ($update) {
          die(json_encode([
            'status' => 'success',
            'msg' => 'Update successfully'
          ]));
        }

        die(json_encode([
          'status' => 'error',
          'msg' => 'Update error or server error'
        ]));
      }

      die(json_encode([
        'status' => 'error',
        'msg' => 'Item not exist'
      ]));
    }
  }

  public function delete()
  {
    # code...
    $this->requiredAdmin();


    if (!empty($_POST['id'])) {


      $id = $_POST['id'];


      $data = $this->model_home->detailTopic($id);

      if (!$data) {
        die(json_encode([
          'status' => 'error',
          'msg' => 'ID invalid'
        ]));
      }

      $delete = $this->model_home->deleteTopic($id);

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
