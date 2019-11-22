<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));

$error='';
if (strlen($login) <= 3)
$error='Введите логин';

if ($error !=''){
  echo $error;
exit();
}

$pass = 18914;
$hash = "sdsfdlfkdghf44ddsgkfdkfe";
$pass = md5($pass . $hash);

require_once '../mysql_connect.php';


$id = 6;
$sql = 'SELECT `login` ,`id` FROM `levels` WHERE `id` = ?';
$query = $pdo->prepare($sql ) ;
$query->execute([$id]);
$users = $query->fetchAll(PDO::FETCH_OBJ);

foreach ($users as $user) {
  if( $user->login != $login )
    echo 'Попробуйте еще раз';
    else{
      $sql = 'SELECT `level4` FROM `users` WHERE `login`= :login';
      $query = $pdo->prepare($sql);
      $query->execute(['login' =>$_COOKIE['login']]);
      $user = $query->fetch(PDO::FETCH_OBJ);
      if($user->level4 == 0)
      {
    $sql = 'SELECT * FROM `users` WHERE `login`= :login';
    $query = $pdo->prepare($sql);
    $query->execute(['login' =>$_COOKIE['login']]);
    $user = $query->fetch(PDO::FETCH_OBJ);
    $user->points=$user->points+30;
    $points=  $user->points;
    $sql = 'UPDATE `users` SET `points` = :points  WHERE `login` =:login';
    $query = $pdo->prepare($sql);
    $query->execute(['points'=>$points , 'login'=>$_COOKIE['login']]);

      $level4 = '1';
      $sql = 'UPDATE `users` SET `level4` = :level4  WHERE `login` =:login';
      $query = $pdo->prepare($sql);
      $query->execute(['level4'=>$level4 , 'login'=>$_COOKIE['login']]);

    }
          echo 'Готово';
 }
}


?>
