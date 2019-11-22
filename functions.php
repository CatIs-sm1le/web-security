<?php

function debug($data){
    echo '<pre>' . print_r($data, true) . '</pre>';
}

function create_message(){
    global $pdo;
    $name = $_POST['name'];
    $text = $_POST['text'];
    $stmt = $pdo->prepare("INSERT INTO gb (`name`, `text`) VALUES (?,?)");
    $stmt->execute([$name, $text]);
}

function get_messages(){
    global $pdo;
    $data = $pdo->query("SELECT * FROM gb ORDER BY id DESC")->fetchAll();
    return $data;
}
