<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/db/database.php';
$db = new Database();
$login = $_POST['login'];
$password = md5($_POST['password']);

//$admins = $db->query("SELECT * FROM `admin`");
//foreach($admins as $oneAdmin){
//    if($oneAdmin['login']==$login && $oneAdmin['password']==$password){
//
//        header('Location: admin-panel.php');
//    }
//    else{
//        $_SESSION['status']="Неверный логин или пароль";
//        header('Location: index.php');
//    }
//}
$admins = $db->query("SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$password'");
if ($admins == null) {
    $_SESSION['status'] = "Неверный логин или пароль";
    header('Location: index.php');

} else {
    header('Location: admin-panel.php');
    $_SESSION['admin'] = [
        "id" => $admins[0]['id'],
        "login"=>$admins[0]['login'],

    ];

}
?>