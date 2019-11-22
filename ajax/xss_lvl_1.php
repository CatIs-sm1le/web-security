<?php

require_once '../mysql_connect.php';
$login=$_COOKIE['login'];


$sql = 'SELECT `levelXSS1` FROM `users` WHERE `login`= :login';
$query = $pdo->prepare($sql);
$query->execute(['login' =>$_COOKIE['login']]);
$user = $query->fetch(PDO::FETCH_OBJ);
if($user->levelXSS1 == 0)
{
$sql = 'SELECT * FROM `users` WHERE `login`= :login';
$query = $pdo->prepare($sql);
$query->execute(['login' =>$_COOKIE['login']]);
$user = $query->fetch(PDO::FETCH_OBJ);
$user->points=$user->points+50;
$points=  $user->points;
$sql = 'UPDATE `users` SET `points` = :points  WHERE `login` =:login';
$query = $pdo->prepare($sql);
$query->execute(['points'=>$points , 'login'=>$_COOKIE['login']]);

      $levelXSS1 = '1';
      $sql = 'UPDATE `users` SET `levelXSS1` = :levelXSS1  WHERE `login` =:login';
      $query = $pdo->prepare($sql);
      $query->execute(['levelXSS1'=>$levelXSS1 , 'login'=>$_COOKIE['login']]);
    }

require_once '../db_xss_1.php';
            $pdo->query(' TRUNCATE TABLE `gb` ');
      echo 'Готово';

?>
