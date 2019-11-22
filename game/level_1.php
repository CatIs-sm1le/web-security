<?php
    if($_COOKIE['login']== ''){
      header('Location:/reg.php');
      exit();
    }
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тринировка</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
    <!-- username:admin9
         password:3321  -->
</head>
<body>
<?php require '../blocks/header.php'; ?>

  <main class="container mt-5 mb-3">
    <div class="row">
      <div class="col-md-8 mb-1">
        <form  method="post">


          <label for="login">Логин</label>
          <input type="text" name="login" id ="login" class="form-control">

          <label for="pass">Пароль</label>
          <input type="password" name="pass" id ="pass" class="form-control">

           <div class="alert alert-danger mt-2" id="error_block"></div>

          <button type="button" id="auth_user" class="btn btn-success mt-5">Войти</button>
        </form>

      </div>
        <div class="col-md-8 mb-3 ">
            <button type="button" id="help" class="btn btn-info mt-5 spoiler-title">Подсказка</button>
        </div>

        <div class="col-md-8 spoiler-body" id="text">
          <p class="spoiler-body">
          Нужна небольшая помощь? Ну, это первый уровень, так что этого следовало ожидать.<br>
          К сожалению,именно во время программирования больше всего проявляется человеческий фактор.<br>
          И первое,что нужно делать  - всегда просматривать исходную страницу (Ctrl + U).
          </p>
        </div>

    </div>
  </main>




    <?php require '../blocks/footer.php'; ?>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$('#auth_user').click(function(){
    let login = $('#login').val();
    let pass = $('#pass').val();

   $.ajax({
     url:'../ajax/level_1.php',
     type:'POST',
     cache:false,
     data:{'login':login,'pass':pass},
     dataType:'html',
     success:function(data){
       if (data == 'Готово'){
       $('#auth_user').text('Готово');
       $('#error_block').hide();
       }else{
      $('#error_block').show();
      $('#error_block').text(data);
      }
     }
   });
});

$('.spoiler-title').click(function(){
$('.spoiler-body').toggle();
});

$('#exit_btn').click(function(){
   $.ajax({
     url:'../ajax/exit.php',
     type:'POST',
     cache:false,
     data:{},
     dataType:'html',
     success:function(data){
        document.location.reload(true);//Перезагрузка страницы
     }
   });


});


</script>

</body>
</html>
