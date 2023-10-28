<div class="container">
  <?php if (!empty($posts)) : $i = 0;?>
    <?php foreach ($posts as $post) : $i++;?>
      <?php if($i < 6) : ?>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?= $post['option_name'] ?></h5>
            <p class="card-text"><?= $post['option_value'] ?></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      <?php endif ;?>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
