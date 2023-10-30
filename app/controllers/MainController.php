<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;
use vendor\core\base\View;

class MainController extends AppController
{

  // public $layout = 'main';

  public function indexAction()
  {
    // \R::fancyDebug(true);
    $model = new Main;
    // echo $test;
    // trigger_error("E_USER_ERROR", E_USER_ERROR);

    $posts = App::$app->cache->get('posts');
    if (!$posts) {
      $posts = \R::findAll('posts');
      App::$app->cache->set('posts', $posts, 3600 * 24);
    }
    $post = \R::findOne('posts', 'id = 1');
    $menu = $this->menu;
    $title = 'PAGE TITLE';
    // $this->setMeta('Главная страница', 'Описание страница', 'Ключевые слова');
    // $meta = $this->meta;
    View::setMeta('Главная страница', 'Описание страница', 'Ключевые слова');
    $this->set(compact('title', 'posts', 'menu'));
  }

  public function testAction()
  {
    if ($this->isAjax()) {
      $model = new Main();
    /*  $data = ['answer' => 'Ответ с сервера', 'code' => 200];
      echo json_encode($data); */
      $post = \R::findOne('posts', "id={$_POST['id']}");
      $this->loadView('_test', compact('post'));
      die;
    }
    echo 222;
  }
}
