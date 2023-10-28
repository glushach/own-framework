<?php

namespace app\controllers;

class NewsPostController extends AppController
{
  public function indexAction()
  {
    echo 'NewsPost::index';
  }

  public function testAction()
  {
    echo 'NewsPost::test';
  }

  public function testPageAction()
  {
    echo 'NewsPost::testPage';
  }

  public function before()
  {
    echo 'NewsPost::before';
  }
}
