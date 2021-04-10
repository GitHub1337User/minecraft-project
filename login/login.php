<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
//login == email
$login = $_POST['login'];
$password = md5($_POST['password']);

$users = $db->query("SELECT * FROM `users` WHERE `login` = :login AND `password` = :passwrod",array($login,$password));
if ($users == null) {
    $_SESSION['status'] = "Неверный логин или пароль";
    $_SESSION['msgType']="msg-bad";
    header('Location: login-form.php');

} else {
    header('Location: /');
    $_SESSION['user'] = [
        "id" => $users[0]['id'],
        "login"=>$users[0]['login'],

    ];

}