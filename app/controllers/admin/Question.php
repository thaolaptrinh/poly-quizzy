<?php

use App\Core\Controller;

class Question extends Controller
{

  protected $model_home;


  public function __construct()
  {
    # code...
    $this->model_home = $this->model('QuestionModel');
  }

  public function delete()
  {
    # code...


    if (!empty($_POST['id'])) {


      $id = $_POST['id'];


      $data = $this->model_home->singleQuestion($id);

      if (!$data) {
        die(json_encode([
          'status' => 'error',
          'msg' => 'ID invalid'
        ]));
      }

      $delete = $this->model_home->deleteQuestion($id);

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


  public function get_detail()
  {
    # code...

    if (!empty($_POST['id'])) {
      $id = $_POST['id'];
      $detail = $this->model_home->singleQuestion($id);
      $this->response($detail);
    }
  }


  public function save_add()
  {
    # code...

    if ($_POST) {

      $model = $this->model('QuestionModel');

      $requestData = $_POST;

      $requiredData = [
        $requestData['topic_id'],
        $requestData['question_title'],
        $requestData['answer_a'],
        $requestData['answer_b'],
        $requestData['answer'],
        $requestData['status'],
      ];
      $checkNull = array_filter($requiredData, 'myFilter');

      if ($checkNull) {
        die(json_encode([
          'status' => 'error',
          'msg' => 'Input empty'
        ]));
      }

      $checkAnswer = $requestData[$requestData['answer']] ?? null;

      if (!$checkAnswer) {
        die(json_encode([
          'status' => 'error',
          'msg' => 'Answer invalid'
        ]));
      }


      $add = $model->addQuestion($requestData);

      if ($add) {
        die(json_encode([
          'status' => 'success',
          'msg' => 'Add question successfully'
        ]));
      }

      die(json_encode([
        'status' => 'error',
        'msg' => 'Add question error or server error'
      ]));
    }
  }
}
