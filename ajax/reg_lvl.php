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

$sql ='INSERT INTO levels(login,pass) VALUES(?,?)';
$query = $pdo->prepare($sql);
$query->execute([$login, $pass]);

echo 'Готово';
?>
