<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/db/database.php';
$db = new Database();
//login == email
$login = $_POST['login'];
$password = md5($_POST['password']);

$users = $db->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
if ($users == null) {
    $_SESSION['status'] = "Неверный логин или пароль";
    header('Location: login-form.php');

} else {
    header('Location: /');
    $_SESSION['user'] = [
        "id" => $users[0]['id'],
        "login"=>$users[0]['login'],

    ];

}