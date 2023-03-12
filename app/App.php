<?php

namespace App;

use App\Core\Route;

class App
{

  protected
    $__controller,
    $__action,
    $__params,
    $__route;

  public function __construct()
  {
    # code...
    $this->__action = 'index';

    $this->__params = [];

    $this->__route = new Route();

    $this->handleUrl();
  }



  public function getUrl(): string
  {
    # code...
    return $_SERVER['PATH_INFO'] ?? '/';
  }


  public function handleUrl()
  {
    # code...
    $url = $this->getUrl();

    $url = $this->__route->handleRoute($url);


    $urlArr = array_filter(explode('/', $url));
    $urlArr = array_values($urlArr);

    $fileName = '';
    $filePath  = '';

    if (!empty($urlArr)) {
      foreach ($urlArr as $key => $value) {
        # code...
        $fileName .=  $value . '/';

        $fileArr = array_filter(explode('/', $fileName));

        $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);

        $fileCheck = implode('/', $fileArr);

        $filePath = __DIR_ROOT__ . '/app/controllers/' . $fileCheck . '.php';

        if (!empty($urlArr[$key - 1])) {
          unset($urlArr[$key - 1]);
        }

        if (file_exists($filePath)) {
          $fileName = $fileCheck;
          break;
        }
      }
      $urlArr = array_values($urlArr);
    }


    // <!-- Controller  -->

    if (!empty($urlArr[0])) {
      $this->__controller = ucfirst($urlArr[0]);
    }

    if (file_exists($filePath)) {
      require_once $filePath;
      if (class_exists($this->__controller)) {
        $this->__controller = new $this->__controller();
        unset($urlArr[0]);
      } else {
        die('2');
        $this->handleNotFound();
      }
    } else {
      $this->handleNotFound();
    }



    // <!-- Action  -->

    if (!empty($urlArr[1])) {
      $this->__action = $urlArr[1];
      unset($urlArr[1]);
    }

    // <!-- Params  -->

    $this->__params  = array_values($urlArr);

    if (method_exists($this->__controller, $this->__action)) {
      return call_user_func_array([$this->__controller, $this->__action], $this->__params);
    } else {
      $this->handleNotFound();
    }
  }


  public function handleNotFound()
  {
    # code...
    if (file_exists(__DIR_ROOT__ . '/app/errors/404.php')) {
      require_once __DIR_ROOT__ . '/app/errors/404.php';
      exit;
    }
    header('HTTP/1.1 404 Not Found');
    exit;
  }
}
