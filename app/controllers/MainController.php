<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;

class MainController extends AppController
{

  // public $layout = 'main';

  public function indexAction()
  {
    // App::$app->getList();
    \R::fancyDebug(true);
    $model = new Main;
    $posts = App::$app->cache->get('posts');
    if(!$posts) {
      $posts = \R::findAll('posts');
      App::$app->cache->set('posts', $posts, 3600*24);
    }
    /* echo date('Y-m-d H:i', time());
    echo '<br>';
    echo date('Y-m-d H:i', 1698680283); */
    $post = \R::findOne('posts', 'id = 1');
    $menu = $this->menu;
    $title = 'PAGE TITLE';
    $this->setMeta('Главная страница', 'Описание страница', 'Ключевые слова');
    // $this->setMeta($post->title, $post->description, $post->keywords);
    $meta = $this->meta;
    $this->set(compact('title', 'posts', 'menu', 'meta'));
  }

  public function testAction()
  {
    $this->layout = 'test';
  }
}
