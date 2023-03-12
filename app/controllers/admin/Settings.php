<?php



use App\Core\Controller;

use App\Core\Model;

class Settings extends Controller
{



  public function general()

  {

    # code...
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $requestData = [
        'title' => $_POST['title'] ?? '2',
        'description' => $_POST['description'] ?? '3',
        'keywords' => $_POST['keywords'] ?? '',
        'status' => $_POST['status'] ?? '',
        'status_captcha' => $_POST['status_captcha'] ?? '4',
        'time_session' => $_POST['time_session'] ?? ''
      ];

      $model = new Model();

      $update = $model->update('settings', $requestData, 1);


      if ($update) {

        die(json_encode([
          'status' => 'success',
          'msg' => 'Update successfully'
        ]));
      }

      die(json_encode([
        'status' => 'error',
        'msg' => 'Update failed'
      ]));
    }
  }




  public function mail()
  {
    # code...
  }
}
