<?php

namespace app\controllers;

class AppController extends \vendor\core\base\Controller
{
  public $menu;

  public function __construct($route)
  {
    parent::__construct($route);
    new \app\models\Main;
    $this->menu = \R::findAll('category');
  }
}
