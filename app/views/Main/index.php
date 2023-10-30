<div class="container">
  <div id="answer"></div>
  <div class="btn btn-dark" id="send">Кнопка</div>
  <?php new \vendor\widgets\menu\Menu(); ?>
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
  <?php endif; ?>
</div>
<script src="/js/test.js"></script>
<script>
  $(function() {
    $('#send').click(function() {
      $.ajax({
        url: '/main/test',
        type: 'post',
        data: {'id': 2},
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
