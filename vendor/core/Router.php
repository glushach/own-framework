<?php

namespace vendor\core;

class Router
{
  protected static $routes = [];
  protected static $route = [];

  public static function add($regexp, $route = [])
  {
    self::$routes[$regexp] = $route;
  }

  public static function getPoutes()
  {
    return self::$routes;
  }

  public static function getPoute()
  {
    return self::$route;
  }

  public static function matchPoute($url)
  {
    foreach (self::$routes as $pattern => $route) {
      if (preg_match("#$pattern#i", $url, $matches)) {
        foreach($matches as $k => $v) {
          if (is_string($k)) {
            $route[$k] = $v;
          }
        }
        if(!isset($route['action'])) {
          $route['action'] = 'index';
        }
        $route['controller'] = self::upperCamelCase($route['controller']);
        self::$route = $route;
        return true;
      }
    }
    return false;
  }

  /**
   * перенаправляет URL по корректному маршруту
   * @param string $url входящий URL
   * @return void
   */
  public static function dispatch($url)
  {
    $url = self::removeQueryString($url);
    if (self::matchPoute($url)) {
      $controller = 'app\controllers\\' . self::$route['controller'];
      if(class_exists($controller)) {
        $cObj = new $controller(self::$route);
        $action = self::lowerCamelCase(self::$route['action']) . 'Action';
        if(method_exists($cObj, $action)) {
          $cObj->$action();
        } else {
          echo "Контроллер <b>$controller::$action</b> не найден";
        }
      } else {
        echo "Контроллер <b>$controller</b> не найден";
      }
    } else {
      http_response_code(404);
      include '404.html';
    }
  }

  protected static function upperCamelCase($name)
  {
    return $name = str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
  }

  protected static function lowerCamelCase($name)
  {
    return lcfirst(self::upperCamelCase($name));
  }

  protected static function removeQueryString($url)
  {
    if($url) {
      $params = preg_split("/(\\&|\\?)/", $url);
      debug($params);
    }
    debug($url);
    return $url;
  }
}
