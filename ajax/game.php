<?php
$login = $_COOKIE['login'];
require_once '../mysql_connect.php';


$sql ='SELECT * FROM `users` WHERE `login`= :login';
//мы вернем его id и на мбольше ничего не надо.Просто существует или нет
$query = $pdo->prepare($sql);
$query->execute(['login' =>$login]);
//fetch - позволяет полцчить лишь одну запись из Бд

$user = $query->fetch(PDO::FETCH_OBJ);
  $json = (string) $user->level1 .','.$user->level2 .','.$user->level3.','.$user->level4.','.$user->level5.','.$user->levelSQL1.','.$user->levelSQL2.','.$user->levelXSS1.','.$user->levelXSS2;
    echo $json;
 ?>
