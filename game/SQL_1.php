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
  <div class="col-md-8 mb-3">
    <h5>Задание: </h5>
     <ul class="list-group">
       <li class="list-group-item">1) Узнать сколько столбцов в таблице,которая используется для выборки на странице</li>
       <li class="list-group-item">2) Узнать имя базы данных</li>
       <li class="list-group-item">3) Узнать список таблиц в базе данных</li>
        <li class="list-group-item">4) Узнать список полей в интересующей нас таблице</li>
        <li class="list-group-item">5) Вытащить нужные данные для выхода в учетную запись</li>
        <li class="list-group-item">6) Расшифровать данные</li>
     </ul>

  </div>
</div>
</div>

<div class="container mt-5">


<form method="GET">
  <label for="title">Поиск по фильмам:</label>
    <input type="text" name="search" class ="search" placeholder="Поиск">
      <input type="submit" name="submit" value="поиск">
</form>
<hr>

<table id="table_yellow">

    <tr height="30" bgcolor="#ffb717" align="center">

        <td width="200"><b>Title</b></td>
        <td width="80"><b>Release</b></td>
        <td width="140"><b>Character</b></td>
        <td width="80"><b>Genre</b></td>
        <td width="80"><b>IMDb</b></td>

    </tr>

<?php

// 1' order by 5 # (-- -)
// 1' union select 1,2,3,4,5,6,7 #
// 1' union select 1,database(),3,4,5,6,7 #
// 1' union select 1,table_name,3,4,5,6,7 from information_schema.tables where table_schema = 'sql_testing'#
// 1' union select 1,column_name,3,4,5,6,7 from information_schema.columns where table_name = 'users' and table_schema = 'sql_testing' #
// 1' union select 1,login,password,4,5,6,7 from users #

if(isset($_GET['submit'])){
 $search =$_GET['search'];
 // $connect = mysql_connect('localhost','root','','sql_testing') or  die(mysql_error());
 $connect = mysql_connect('localhost','root','') or  die(mysql_error());
 $database = 'sql_testing';
 $database = mysql_select_db($database,  $connect);

// $query = mysql_query( $connect,"SELECT * FROM `movies` WHERE  `title` LIKE '%$search%'");
$sql = "SELECT * FROM `movies` WHERE `title` LIKE '%$search%'";

   $query = mysql_query($sql, $connect);
if(!$query)
    {

        // die("Error: " . mysql_error());

?>
        <tr height="50">
            <td colspan="5" width="580"><?php die("Error: " . mysql_error()); ?></td>
        </tr>
<?php
 }



 if(mysql_num_rows($query) != 0)
    {

        while($row = mysql_fetch_array($query))
        {

            // print_r($row);

?>

        <tr height="30">

            <td><?php echo $row["title"]; ?></td>
            <td align="center"><?php echo $row["release_year"]; ?></td>
            <td><?php echo $row["main_character"]; ?></td>
            <td align="center"><?php echo $row["genre"]; ?></td>
            <td align="center"><?php echo $row["imdb"]; ?>Link</td>

        </tr>
<?php
}

}

else
   {

?>

       <tr height="30">
           <td colspan="5" width="580">No movies were found!</td>

       </tr>
<?php
}

    mysql_close($connect);

}
else
{
?>

        <tr height="30">

            <td colspan="5" width="580"></td>
            <!--
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            -->

        </tr>
<?php
}
?>
    </table>


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

      <div class="col-md-8 spoiler-body" id="text">
        <div>
          <p>
            <h4>SQL инъекция</h4>
          Суть таких инъекций – внедрение в данные (передаваемые через GET, POST запросы или значения Cookie) произвольного SQL кода. Если сайт уязвим и выполняет такие инъекции, то по сути есть возможность творить с БД что угодно. <br>
        </p> Возможные SQL инъекции (SQL внедрения)
        <ul>
          <li>1) Наиболее простые — сворачивание условия WHERE к истиностному результату при любых значениях параметров. </li>
            <li>2) Присоединение к запросу результатов другого запроса. Делается это через-оператор UNION. </li>
              <li>3) Закомментирование части запроса. </li>
        </ul>
          <br><br>
          <p>
          <h4>Рассмотрим пример</h4><br>Узнам есть ли SQL инъекция для этого вводим кавычку (') в поле "поиск" (в данным случае). Если мы это используем,то это приводит к :<br> Error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '%'' at line 1<br>
          В реальности такого результата быть не должно. Мы видим ошибку ,то есть этот запрос ,который выполнился он привел к SQL ошибки,а если точнее,то к ошибки синтаксиса. Все ваши запросы должны возвращать какой-либо результат.Это либо в качестве результат какой-то массив фильмов (в данном случае) или один фильм,либо пустой массив ,т.е. по запросу ничего не нашли. Хакер теперь можно узнать все необходимые ему данные.
           Первое, что ему нужно узнать это количество столбцов в исходной таблице. Это нужно того чтобы мы могли использовать затем запрос UNION.Для выбора фильмов используется запрос SELECT, а если хотим обратиться к какой-нибудь другой табличке,т.е. сделать два SELECT , то можем сделать объедение запроса с помощью оператора UNION.В этом случае мы должны выбирать вторым запросом ровно столько столбцов сколько выбирает и первый. Если первый выбирает,например, 5,то и вторым ровно 5 столбцов. Именно для этого хакеру может потребоваться знание количества столбцов (сколько их в базе данных). Для этого он может использовать следующий запрос:<br> <b>1' order by 5 #</b><br> (# - В SQL это считается комментарием. Вместо # мы можем использовать -- -). Тут мы пытаемся выбрать фильм с названием 1,а дальше пытаемся сортировать по какой-то колонке (мы можем сортировать не только по ,например,названию ,но еще и по номеру колонки).Т.е. мы говорим :"Сортируй по 5 колонке". Наш запрос может выдать ошибку,а может и нет. Если мы видим ошибку: <br> Error: Unknown column '5' in 'order clause', то это говорит что в таблице нет столько колонок. Если мы уменьшим количество колонок,например, до 3 ,то получим :No movies were found!. Т.е. мы можем узнать диапазон колонок. В рассматриваемом примере меньше 5 ,но больше 3.
Дальше нам надо узнать имя базы данных. Для этого используем такой запрос: <br><b>1' union select 1,2,3,4,5 #</b> <br>(1,2,3,4,5 - количество колонок ,которые мы узнали на предыдущем шаге). Нам выдаются в результате некоторые колонки ( в данном случае помещаются в таблицу). Теперь мы на место ,например,2 колонки подставляем функцию database(),которая возвращает имя нашей базы данных.
Чтобы узнать список таблиц в базе данных используем запрос: <br><b>1' union select 1,table_name,3,4,5 from information_schema.tables where table_schema = 'База данных,которую мы узнали на втором шаге'#</b><br>
Чтобы знать список полей в интересующей нас таблице используем запрос:<br> <b>1' union select 1,column_name,3,4,5 from information_schema.columns where table_name = 'Таблица у которой хотим узнать поля' and table_schema = 'База данных,которую мы узнали на втором шаге' #</b><br>
Чтобы вытащить логин и пароль мы используем такой запрос :<br> <b>1' union select 1,нужные данные для выхода в учетную запись ,нужные данные для выхода в учетную запись ,нужные данные для выхода в учетную запись ,5 from Таблица у которой хотим узнать поля # </b><br>
<h4>Защита от SQL инъекций</h4>
Защита от SQL - это проверка всего кода на возможность внедрения. Проверять нужно всё – числа, строки, даты, данные в специальных форматах.
<br><b>Числа</b><br>
Для проверки переменной на числовое значение используется функция is_numeric(n);, которая вернёт true, если параметр n — число, и false в противном случае.
<br><b>Строки</b><br>
Большинство взломов через SQL происходят по причине нахождения в строках «необезвреженных» кавычек, апострофов и других специальных символов. Для такого обезвреживания нужно использовать функцию addslashes($str);, которая возвращает строку $str с добавленным обратным слешем (\) перед каждым специальным символом. Данный процесс называется экранизацией.
<br><b>Магические кавычки</b><br>
Магические кавычки – эффект автоматической замены кавычки на обратный слэш (\) и кавычку при операциях ввода/вывода. В некоторых конфигурациях PHP этот параметр включён, а в некоторых нет.

<br>Самый действенный способ это использование технологии PDO.PDO (PHP Data Objects) — расширение PHP, которое реализует взаимодействие с базами данных при помощи объектов. Профит в том, что отсутствует привязка к конкретной системе управления базами данных.А так же исплользование уже встроенных функций-фильтров на корректность вводимых даных.Например, filter_var и т.д.<br>
 </p>

</div>


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
     url:'../ajax/SQL_1.php',
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
$('.spoiler-title').click(function(){
$('.spoiler-body').toggle();
});

</script>

</body>
</html>
