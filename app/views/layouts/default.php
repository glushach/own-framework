<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DEFAULT | <?=$title?></title>
  <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="/css/main.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <?php foreach ($menu as $item) : ?>
              <li><a href="<?= $item['id'] ?>"><?= $item['title'] ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </nav>

    <h1>Hello, world!</h1>

    <?=$content;?>

    <!-- <?= debug(\vendor\core\Db::$countSql) ?> -->
    <!-- <?= debug(\vendor\core\Db::$queries) ?> -->
  </div>
  <script src="/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
