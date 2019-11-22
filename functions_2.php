<?php

function debug($data){
    echo '<pre>' . print_r($data, true) . '</pre>';
}

function create_message(){
    global $pdo;
    $name = $_POST['name'];
    $text = $_POST['text'];
    $newname =preg_replace("<script>","",$name);
    $newtext =preg_replace("<script>","",$text);
    $stmt = $pdo->prepare("INSERT INTO gb (`name`, `text`) VALUES (?,?)");
    $stmt->execute([$newname, $newtext]);
}
// <script>alert("Привет");</script>
function get_messages(){
    global $pdo;
    $data = $pdo->query("SELECT * FROM gb ORDER BY id DESC")->fetchAll();
    return $data;
}
