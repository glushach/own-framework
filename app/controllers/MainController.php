<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{

  // public $layout = 'main';

  public function indexAction()
  {
    $model = new Main;
    $posts = \R::findAll('posts', 'id < ?', [6]);
    $menu = $this->menu;
    $title = 'PAGE TITLE';
    $this->set(compact('title', 'posts', 'menu'));
  }
}
