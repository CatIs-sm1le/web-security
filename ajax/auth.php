<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error='';
if (strlen($login) <= 3)
$error='Введите логин';
else if (strlen($pass) <= 3)
$error='Введите пароль';

if ($error !=''){
  echo $error;
exit();
}

$hash = "sdsfdlfkdghf44ddsgkfdkfe";
$pass = md5($pass . $hash);

require_once '../mysql_connect.php';

$sql ='SELECT `id` FROM `users` WHERE `login`= :login && `pass` = :pass';
//мы вернем его id и на мбольше ничего не надо.Просто существует или нет
$query = $pdo->prepare($sql);
$query->execute(['login' =>$login,'pass'=>$pass]);
//fetch - позволяет полцчить лишь одну запись из Бд

$user = $query->fetch(PDO::FETCH_OBJ);
if($user->id == 0)
echo 'Такого пользователя не существует';
else{
//Сохранение данных о том,что пользователь дейсвтильно авторизовался
   //месяц +3600 * 24 *30
  // setcookie('login', $login,time() +3600 * 24 *30,"/");
  setcookie('login', $login,time() +3600 * 24 *30,"/",'course-work',0,1);
  // httponly - эта кука доступна только по протокулу http,т.е. она не будет доступна JS;httponly 1;
  // course-work - это домен.Нужно исправить.
  //  setcookie('login', $login,time() +3600 * 24 *30,"/",'localhost',0,1);

  // кууи для всего сайта "/"
  echo 'Готово';
}
?>
