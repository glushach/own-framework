<?php

namespace app\controllers;

use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PHPMailer\PHPMailer\PHPMailer;

class MainController extends AppController
{
  public function indexAction()
  {
    $model = new Main;

    $lang = App::$app->getProperty('lang')['code'];
    $total = \R::count('posts', 'lang_code = ?', [$lang]);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perpage = 2;

    $pagination = new Pagination($page, $perpage, $total);
    $start = $pagination->getStart();

    $posts = \R::findAll('posts', "lang_code = ? LIMIT $start, $perpage", [$lang]);
    View::setMeta('Blog :: Главная страница', 'Описание страница', 'Ключевые слова');
    $this->set(compact('posts', 'pagination', 'total'));
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
