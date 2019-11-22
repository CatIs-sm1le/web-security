<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация на сайте</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
</head>
<body>
<?php require 'blocks/header.php'; ?>

  <main style="margin: 10vh auto" class="container">
    <div class="d-flex flex-column justify-content-center">
      <h3 class="d-flex justify-content-center">Форма регистрации</h3>
      <div style="width: 40%; margin: 0 auto;">

          <form style="width: 100%" method="post">

            <label for="username">Ваше имя</label>
            <input type="text" name="username" id ="username" class="form-control">

            <label for="email">Email</label>
            <input type="email" name="email" id ="email" class="form-control">

            <label for="login">Логин</label>
            <input type="text" name="login" id ="login" class="form-control">

            <label for="pass">Пароль</label>
            <input type="password" name="pass" id ="pass" class="form-control">

             <div class="alert alert-danger mt-2" id="error_block"></div>

             <div class="regestration-info">
               <p>By providing my information and clicking on the register button,
                 I confirm that I have read and agree to this website's terms and <span style="color: #007bff">conditions and privacy policy</span>.
               </p>
             </div>
            <button type="button" id="reg_user" class="btn btn-outline-primary mt-3">Зарегистрироваться</button>
          </form>
      </div>
    </div>
  </main>

    <?php require 'blocks/footer.php'; ?>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<script>

$("#reg_user").click (function () {
       $('#error_block').hide();
 let email = $("#email").val ();
 let fail = "";
if (email.split ('@').length - 1 == 0 || email.split ('.').length - 1 == 0)
  fail = "Введен неоректный E-mail";
 if (fail != "") {
  $('#error_block').text(fail);
  $('#error_block').show ();
  return false;
 }
 let name = $('#username').val();
 // let email = $('#email').val();
 let login = $('#login').val();
 let pass = $('#pass').val();

$.ajax({
  url:'ajax/reg.php',
  type:'POST',
  cache:false,
  data:{'username':name ,'email':email,'login':login,'pass':pass},
  dataType:'html',
  success:function(data){
    if (data == 'Готово'){
    $('#reg_user').text('Все готово');
    $('#error_block').hide();
    }else{
   $('#error_block').show();
   $('#error_block').text(data);
   }
  }
});
});


</script>

</body>
</html>
