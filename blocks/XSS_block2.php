<main class="container mt-5 mb-2">

  <div class="row">
    <div class="col-md-8 mb-3">
      <h5>Задание: </h5>
       <p>Создать модальное окно с помощью JavaScript.На этот раз стоит простой фильтр.</p>
   <p> После нажатие "Готово" уровень будет автоматически зачтен.Если хочешь автоматически получить баллы и не научиться,то просто жми "Готово"</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 mb-3">
      <form method="post">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Имя" >
                  </div>
                  <div class="form-group">
                      <label for="text">Сообщение</label>
                      <textarea class="form-control" id="text" rows="3" name="text"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              <div class="col-md-6 mt-3">
                  <?php if(!empty($messages)): ?>
                      <?php foreach($messages as $message): ?>
                          <div class="message">
                              <h5 class="name"><?=$message['name'];?></h5>
                              <div class="text"><?=$message['text'];?></div>
                          </div>
                      <?php endforeach; ?>
                  <?php       require_once '../db_xss_2.php';
  
                                      $pdo->query(' TRUNCATE TABLE `gb`');
                             endif; ?>
          </div>
    </div>
    <div class="col-md-8 mb-3 ">
        <button type="button" id="ready" class="btn mt-5 btn-success">Готово</button>
    </div>
  </div>
</main>
