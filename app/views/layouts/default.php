<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php \fw\core\base\View::getMeta() ?>
  <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/main.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-0">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav d-flex gap-4 py-4">
            <li><a href="/">Home</a></li>
            <li><a href="/page/about">About</a></li>
            <li><a href="/admin">Admin</a></li>
            <li><a href="/user/signup">Singup</a></li>
            <li><a href="/user/login">Login</a></li>
            <li><a href="/user/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <?php if(isset($_SESSION['error'])) : ?>
      <div class="alert alert-danger">
        <?= $_SESSION['error']; unset($_SESSION['error']) ?>
      </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['success'])) : ?>
      <div class="alert alert-success">
        <?= $_SESSION['success']; unset($_SESSION['success']) ?>
      </div>
    <?php endif; ?>

    <!-- <?php debug($_SESSION); ?> -->

    <?=$content;?>

    <!-- <?= debug(\fw\core\Db::$countSql) ?> -->
    <!-- <?= debug(\fw\core\Db::$queries) ?> -->
  </div>
  <script src="/jquery/jquery-3.7.1.min.js"></script>
  <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
  <?php
    foreach($scripts as $script) {
      echo $script;
    }
  ?>
</body>

</html>
