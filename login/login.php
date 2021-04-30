<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
//login == email
$login = $_POST['login'];
$password = $_POST['password'];

//$users = $db->query("SELECT * FROM `users` WHERE `login` = :login AND `password` = :passwrod",array($login,$password));
$users = $db->query("SELECT * FROM `users` WHERE `login` = :login",array($login));
if ($users == null) {
    $_SESSION['status'] = "Неверный логин";
    $_SESSION['msgType']="msg-bad";
    header('Location: login-form.php');

} else {
//    echo "<pre>";
//
//    var_dump($users[0]);
//    echo "</pre>";
    if(password_verify($password,$users[0]['password'])) {
        header('Location: /');
        $_SESSION['user'] = [
            "id" => $users[0]['Id'],
            "login" => $users[0]['login'],

        ];
    }
    else{
        $_SESSION['status'] = "Неверный пароль";
        $_SESSION['msgType']="msg-bad";
        header('Location: login-form.php');
    }

}