<?php
    if($_COOKIE['login']== ''){
      header('Location:/reg.php');
      exit();
    }

    require_once  '../db_xss_1.php';
    require_once  '../functions.php';

    if(!empty($_POST)){
      require_once '../db_xss_1.php';
            $pdo->query(' TRUNCATE TABLE `gb` ');
        create_message();
        header("Location: ../game/XSS_1.php");
        exit;
    }
    $messages = get_messages();
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

  <?php require '../blocks/XSS_block.php'; ?>

    <?php require '../blocks/footer.php'; ?>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

$('#ready').click(function(){
   $.ajax({
     url:'../ajax/xss_lvl_1.php',
     type:'POST',
     cache:false,
     data:{},
     dataType:'html',
     success:function(data){
       if (data == 'Готово'){
       $('#ready').text('Зачтено');
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
$('.spoiler-title').click(function(){
$('.spoiler-body').toggle();
});

</script>

</body>
</html>
