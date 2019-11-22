<main class="container mt-5 mb-2">

  <div class="row">
    <div class="col-md-8 mb-3">
      <h5>Задание: </h5>
       <ul class="list-group">
         <li class="list-group-item">1) Изменить стиль чего-либо</li>
         <li class="list-group-item">2) Создать модальное окно с помощью JavaScript</li>
         <li class="list-group-item">3) Добавить собственный блок через тег div </li>
       </ul>
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
                  <?php       require_once '../db_xss_1.php';
                              $pdo->query('UPDATE `gb` SET `name` = NULL');
                               $pdo->query('UPDATE `gb` SET `text` = NULL');
                             endif; ?>
          </div>
    </div>
    <div class="col-md-8 mb-3 ">
        <button type="button" id="help" class="btn btn-info mt-5 spoiler-title">Подсказка</button>
    </div>

    <div class="col-md-8 spoiler-body" id="text">
      <div class="spoiler-body">
        <p >
          XSS (межсайтовый скриптинг) — атака на пользователя, которая позволяет атакующему выполнить произвольный сценарий в контексте браузера его жертвы.
          <br>Два простейших вектора атаки:  </p>
          <ul>
            <li>1) Вставка ссылки, в частности. А в общем случае — изменение внешнего вида страницы.
               Например, в вашу страницу могут внедрить html-код и выводить какое-нибудь фейковое окно с запросом данных.</li>
            <li>2) Исполнение скрипта, например, перехват cookies пользователя.</li>
          </ul>
          <p>
            <h5>Защита:</h5>
            <p>
            Использование функций(фильтров): strip tags,htmlspecialchars,htmlentities и т.д.
            </p>
          </p>
      </div>
    </div>
    <div class="col-md-8 mb-3 ">
        <button type="button" id="ready" class="btn mt-5 btn-success">Готово</button>
    </div>
  </div>
</main>
