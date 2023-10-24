<?php

$query = rtrim($_SERVER['REQUEST_URI'], '/'); //QUERY_STRING

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');

require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

spl_autoload_register(function($class) {
  $file = APP . "/controllers/$class.php";
  if(is_file($file)) {
    require_once $file;
  }
});

Router::add('^/pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Posts']);

// defaults routs
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

// Router::add('<controller: [a-z-]+>/<action: [a-z-]+>'); // реализация во фремворках, например Yii

debug(Router::getPoutes());

Router::dispatch($query);
