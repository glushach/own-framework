<div class="container">
  <div id="answer"></div>
  <div class="btn btn-dark" id="send">Кнопка</div>
  <br>
  <?php new \fw\widgets\menu\Menu([
    // 'tpl' => WWW . '/menu/my_menu.php',
    'tpl' => WWW . '/menu/select.php',
    'container' => 'select',
    'class' => 'my-select',
    'table' => 'categories',
    'cache' => 60,
    'cacheKey' => 'menu_select',
  ]); ?>
<!--   <?php new \fw\widgets\menu\Menu([
    'tpl' => WWW . '/menu/my_menu.php',
    'container' => 'ul',
    'class' => 'my-menu',
    'table' => 'categories',
    'cache' => 60,
    'cacheKey' => 'menu_ul',
  ]); ?> -->
  <?php if (!empty($posts)) : ?>
    <?php foreach ($posts as $post) : ?>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $post['title'] ?></h5>
          <p class="card-text"><?= $post['text'] ?></p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="text-center">
      <p>Статей: <?= count($posts) ;?> из <?= $total ;?></p>
      <?php if($pagination->countPages > 1) : ?>
        <?= $pagination ;?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>
<script src="/js/test.js"></script>
<script>
  $(function() {
    $('#send').click(function() {
      $.ajax({
        url: '/main/test',
        type: 'post',
        data: {
          'id': 2
        },
        success: function(res) {
          // const data = JSON.parse(res);
          // $('#answer').html(`<p>Ответ: ${data.answer} | Код: ${data.code}</p>`);
          $('#answer').html(res);
          // console.log(res);
        },
        error: function() {
          alert('Error!');
        }
      });
    });
  });
</script>
