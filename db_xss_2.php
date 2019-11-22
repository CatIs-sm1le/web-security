<?php

$db = [
    'dsn' => 'mysql:host=localhost;dbname=xss_2;charset=utf8',
    'user' => 'root',
    'pass' => '',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
];

$pdo = new PDO($db['dsn'], $db['user'], $db['pass'], $db['options']);
