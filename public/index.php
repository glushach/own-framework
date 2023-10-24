<?php

$query = rtrim($_SERVER['REQUEST_URI'], '/'); //QUERY_STRING

require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

Router::add('/posts/add', ['controller' => 'Posts', 'action' => 'add']);
Router::add('/posts', ['controller' => 'Posts', 'action' => 'index']);
Router::add('', ['controller' => 'Main', 'action' => 'index']);

debug(Router::getPoutes());

if(Router::matchPoute($query)) {
  debug(Router::getPoute());
} else {
  echo '404';
}
