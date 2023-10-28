<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{

  // public $layout = 'main';

  public function indexAction()
  {
    $model = new Main;
    // $res = $model->query("CREATE TABLE posts SELECT * FROM dalid.wp_options");
    $posts = $model->findAll();
    $posts2 = $model->findAll();
    // $post = $model->findOne(5);
    // $data = $model->findBySgl("SELECT * FROM posts ORDER BY option_id DESC LIMIT 2");
    // $data = $model->findBySgl("SELECT * FROM {$model->table} WHERE option_name LIKE ?", ['%ai%']);
    $data = $model->findLike('ego', 'option_name');
    debug($data);
    $title = 'PAGE TITLE';
    $this->set(compact('title', 'posts'));
  }
}
