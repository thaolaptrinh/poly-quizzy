<?php



use App\Core\Controller;

class Home extends Controller
{


  public $data = [];
  private $model_home;

  public function __construct()
  {
    # code...

    $this->model_home = $this->model('admin/HomeModel');

    if (!isset($_SESSION['admin_login'])) {
      redirect(__BASE_URL__ . '/admin/login');
    } else {
      $getUser = $this->model_home->get_row(" SELECT * FROM `users` WHERE `role` = 'admin' AND `token` = '" . check_string($_SESSION['admin_login']) . "'  ");
      if (!$getUser) {
        redirect(__BASE_URL__ . '/admin/login');
      }
    }
  }

  public function index()

  {

    # code...
    $this->data['content'] = 'admin/index';
    $this->data['title'] = 'Dashboard';
    $this->data['sub_content']['total'] = $this->model_home->dataTotal();
    $this->render('layouts/admin', $this->data);
  }

  public function users()
  {
    # code...
    $this->data['content'] = 'admin/users/list';
    $this->data['title'] = 'Users';
    $this->data['sub_content']['data'] = $this->model_home->dataUsers();
    $this->data['sub_content']['total'] = $this->model_home->statisticUser();
    $this->render('layouts/admin', $this->data);
  }


  public function topics()
  {
    # code...
    $this->data['content'] = 'admin/topics/list';
    $this->data['title'] = 'Topics';
    $this->data['sub_content']['data'] = $this->model_home->dataTopics();
    $this->render('layouts/admin', $this->data);
  }

  public function logs()
  {
    # code...

    $this->data['title'] = 'Logs';
    $this->data['content'] = 'admin/logs';
    $this->data['sub_content']['data'] = $this->model_home->dataLogs();
    $this->render('layouts/admin', $this->data);
  }


  public function settings()
  {
    # code...
    $this->data['title'] = 'Settings';
    $this->data['content'] = 'admin/settings';
    $this->data['sub_content']['data'] = $this->model_home->dataSetting();
    $this->render('layouts/admin', $this->data);
  }
}
