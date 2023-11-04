<?php

namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PHPMailer\PHPMailer\PHPMailer;

class MainController extends AppController
{

  // public $layout = 'main';

  public function indexAction()
  {
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler(ROOT . '/tmp/your.log', Logger::WARNING));
    $log->warning('Foo');
    $log->error('Bar');

    $mailer = new Phpmailer();
    // var_dump($mailer);



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
