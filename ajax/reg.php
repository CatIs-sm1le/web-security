<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
//trim() - обрезает строку. убирает пробелы


$error='';
if(strlen($username) <= 3)
$error='Введите имя.Оно должено быть больше 3 символов';
else if (strlen($email) <= 3)
$error='Введите email';
else if (strlen($login) <= 3)
$error='Введите логин.Он должен быть больше 3 символов';
else if (strlen($pass) <= 7)
$error='Введите пароль.Он должен быть больше 7 символов.';

$login_one = $login;
require_once '../mysql_connect.php';
$sql ='SELECT `login` FROM `users` WHERE `login`= :login ';
$query = $pdo->prepare($sql);
$query->execute(['login' =>$login]);

$user = $query->fetch(PDO::FETCH_OBJ);
if($user->login == $login_one )
$error='К сожалению,логин занят.';


if ($error !=''){
  echo $error;
exit();
}

$hash = "sdsfdlfkdghf44ddsgkfdkfe";
$pass = md5($pass . $hash);



$sql ='INSERT INTO users(name,email,login,pass) VALUES(?,?,?,?)';
$query = $pdo->prepare($sql);
$query->execute([$username ,$email,$login, $pass]);

echo 'Готово';
?>
