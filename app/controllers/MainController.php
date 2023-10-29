<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{

  // public $layout = 'main';

  public function indexAction()
  {
    // \R::fancyDebug(true);
    $model = new Main;
    $posts = App::$app->cache->get('posts');
    $post = \R::findOne('posts', 'id = 1');
    $menu = $this->menu;
    $title = 'PAGE TITLE';
    $this->setMeta('Главная страница', 'Описание страница', 'Ключевые слова');
    $meta = $this->meta;
    $this->set(compact('title', 'posts', 'menu', 'meta'));
  }

  public function testAction()
  {
    if ($this->isAjax()) {
      echo 111;
      die;
    }
    echo 222;
    // $this->layout = false;
  }
}
