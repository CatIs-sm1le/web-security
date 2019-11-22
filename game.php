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

<?php require 'blocks/header.php'; ?>



  <main class="container mt-5">
    <h5>Базовые уровни</h5>
    <div class="d-flex flex-row">
      <div style="margin: 15px 0" class="d-flex justify-content-start">
          <a href="game/level_1.php"><button type="button" id="Level_1" class="btn btn-game">Level 1 <br>Points: 10 </button></a>
          <a href="game/level_2.php"><button type="button" id="Level_2" class="btn btn-game">Level 2 <br>Points: 20 </button></a>
          <a href="game/level_3.php"><button type="button" id="Level_3" class="btn btn-game">Level 3 <br>Points: 30 </button></a>
          <a href="game/level_4.php"><button type="button" id="Level_4" class="btn btn-game">Level 4 <br>Points: 30 </button></a>
          <a href="game/level_5.php"><button type="button" id="Level_5" class="btn btn-game">Level 5 <br>Points: 40 </button></a>
      </div>
    </div>

    <h5>SQL Injection</h5>
    <div style="margin: 15px 0" class="d-flex flex-row justify-content-start">
          <a href="game/SQL_1.php"><button type="button" id="Level_6" class="btn btn-game">Level 1<br>Points: 70 </button></a>
          <a href="game/SQL_2.php"><button type="button" id="Level_7" class="btn btn-game">Level 2<br>Points: 50 </button></a>
    </div>

    <h5>XSS</h5>
    <div style="margin: 15px 0" class="d-flex flex-row justify-content-start">
          <a href="game/XSS_1.php"><button type="button" id="Level_8" class="btn btn-game">Level 1<br>Points: 50 </button></a>
          <a href="game/XSS_2.php"><button type="button" id="Level_9" class="btn btn-game">Level 2<br>Points: 60 </button></a>
    </div>
  </main>

    <?php require 'blocks/rating.php'; ?>
    <?php require 'blocks/footer.php'; ?>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<script>


   $.ajax({
     url:'ajax/game.php',
     type:'POST',
     cache:false,
     data:{},
     dataType:'html',
     success:function(done){
       let array = JSON.parse("[" + done + "]");
       if (array[0] == "1") $('#Level_1').addClass("btn-success");
       else $('#Level_1').addClass("btn-warning");
      if (array[1] == "1") $('#Level_2').addClass("btn-success");
      else $('#Level_2').addClass("btn-warning");
      if (array[2] == "1") $('#Level_3').addClass("btn-success");
      else $('#Level_3').addClass("btn-warning");
      if (array[3] == "1") $('#Level_4').addClass("btn-success");
      else $('#Level_4').addClass("btn-warning");
      if (array[4] == "1") $('#Level_5').addClass("btn-success");
      else $('#Level_5').addClass("btn-warning");
      if (array[5] == "1") $('#Level_6').addClass("btn-success");
      else $('#Level_6').addClass("btn-warning");
      if (array[6] == "1") $('#Level_7').addClass("btn-success");
      else $('#Level_7').addClass("btn-warning");
      if (array[7] == "1") $('#Level_8').addClass("btn-success");
      else $('#Level_8').addClass("btn-warning");
      if (array[8] == "1") $('#Level_9').addClass("btn-success");
      else $('#Level_9').addClass("btn-warning");
     }
   });

</script>

</body>
</html>
