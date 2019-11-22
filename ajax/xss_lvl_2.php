<?php

require_once '../mysql_connect.php';
$login=$_COOKIE['login'];

$sql = 'SELECT `levelXSS2` FROM `users` WHERE `login`= :login';
$query = $pdo->prepare($sql);
$query->execute(['login' =>$_COOKIE['login']]);
$user = $query->fetch(PDO::FETCH_OBJ);
if($user->levelXSS2 == 0)
{
$sql = 'SELECT * FROM `users` WHERE `login`= :login';
$query = $pdo->prepare($sql);
$query->execute(['login' =>$_COOKIE['login']]);
$user = $query->fetch(PDO::FETCH_OBJ);
$user->points=$user->points+60;
$points=  $user->points;
$sql = 'UPDATE `users` SET `points` = :points  WHERE `login` =:login';
$query = $pdo->prepare($sql);
$query->execute(['points'=>$points , 'login'=>$_COOKIE['login']]);

      $levelXSS2 = '1';
      $sql = 'UPDATE `users` SET `levelXSS2` = :levelXSS2  WHERE `login` =:login';
      $query = $pdo->prepare($sql);
      $query->execute(['levelXSS2'=>$levelXSS2 , 'login'=>$_COOKIE['login']]);
    }

require_once '../db_xss_2.php';
        $pdo->query(' TRUNCATE TABLE `gb` ');
      echo 'Готово';

?>
