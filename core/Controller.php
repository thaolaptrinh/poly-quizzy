<?php

namespace App\Core;


class Controller
{

  public function model($model)
  {
    # code...
    $filePath = __DIR_ROOT__ . '/app/models/' . $model . '.php';
    if (file_exists($filePath)) {

      require_once $filePath;
      $model = explode('/', $model);
      $model = $model[count($model) - 1];
      if (class_exists($model)) {
        return new $model();
      }
    }
  }

  public function response($data)
  {
    # code...
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    die(json_encode($data));
  }

  public function render($view, $data = [])
  {
    # code...
    if (!empty($data)) {
      extract($data);
    }
    $filePath = __DIR_ROOT__ . '/app/views/' . $view . '.php';
    if ($filePath) {
      require_once $filePath;
    }
  }
}
