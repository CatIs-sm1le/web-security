<?php
$user = 'root';
$password ='';
$db ='testing';
$host = 'localhost';

$dsn ='mysql:host ='.$host.';dbname='.$db;
$pdo = new PDO($dsn, $user, $password);
 ?>
