<?php

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
      if ($url == $pattern) {
        self::$route = $route;
        return true;
      }
    }
    return false;
  }
}
