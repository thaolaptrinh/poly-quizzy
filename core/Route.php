<?php

namespace App\Core;


class Route
{

  public function handleRoute($url)
  {
    # code...

    $routes = require './configs/routes.php';
    $route = trim($url, '/');

    if (!empty($routes)) {
      foreach ($routes as $key => $value) {

        if ($key == $route) {
          $route = $value;
          break;
        }
        // if (preg_match('~' . $key . '~is', $url)) {
        //   $route = preg_replace('~' . $key . '~is', $value, $url);
        //   break;
        // }
      }
    }

    return $route;
  }
}
