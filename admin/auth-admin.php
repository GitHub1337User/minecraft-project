<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
$login = $_POST['login'];
$password = md5($_POST['password']);

$admins = $db->query("SELECT * FROM `admin` WHERE `login` = :login AND `password` = :password",array($login,$password));
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