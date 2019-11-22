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

</head>
<body>
<?php require '../blocks/header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="login">Логин</label>
                    <input type="text" name="login_1" class="form-control" id="password" placeholder="Логин">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="pass_1" class="form-control" id="password" placeholder="Пароль">
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
            <?php

           if(!empty($_POST)){
               require_once  '../db.php';
               $login = $_POST['login_1'];
               $pass = md5($_POST['pass_1']);
               $data = $pdo->query("SELECT * FROM users WHERE login = '{$login}' AND pass = '{$pass}'")->fetchAll();
               // $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ? AND pass = ? LIMIT 1");
               // $stmt->execute([$login, $pass]);
               // $data = $stmt->fetchAll();
               if($data){
                print_r($data);
                 ?>
                 <div class="alert alert-success mt-2" role="alert"><p>Успех.Вы сейчас вошли под администртора</p></div>
                 <div class="alert alert-danger mt-2" role="alert"><p>Как сейчас: $data = $pdo->query("SELECT * FROM users WHERE login = '{$login}' AND pass = '{$pass}'")->fetchAll();</p></div>
                 <div class="alert alert-success mt-2" role="alert"><p>Как нужно:<br>$stmt = $pdo->prepare("SELECT * FROM users WHERE login = ? AND pass = ? LIMIT 1");<br>
                   $stmt->execute([$login, $pass]);<br>
                   $data = $stmt->fetchAll();</p></div>

                  <?php
               }else {
                 ?>
                 <div class="alert alert-danger mt-2" role="alert">Неверный логин или пароль.Попробуйте еще раз.</div>
                  <?php
               }

           }
           ?>
        </div>
    </div>
</div>

  <main class="container mt-5 mb-2">
    <div class="row">
      <div class="col-md-8 mb-3">
         <div class='level-form'>
              <form  method="post">
                <label for="login">Логин</label>
                <input type="text" name="login" id ="login" class="form-control">

                <label for="pass">Пароль</label>
                <input type="password" name="pass" id ="pass" class="form-control">

                 <div class="alert alert-danger mt-2" id="error_block"></div>

                <button type="button" id="auth_user" class="btn btn-success mt-5">Войти</button>
              </form>
    </div>
      </div>
      <div class="col-md-8 mb-3 ">
          <button type="button" id="help" class="btn btn-info mt-5 spoiler-title">Подсказка</button>
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
     url:'../ajax/SQL_2.php',
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
