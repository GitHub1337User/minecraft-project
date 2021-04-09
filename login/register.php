<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/db/database.php';
$db = new Database();
//login == email
$login = $_POST['login'];
$nickname = $_POST['nickname'];
$password = $_POST['password'];
$password_repeat = $_POST['password-repeat'];

if($password===$password_repeat) {
    $password=md5($password);

    $users = $db->query("SELECT * FROM `users` WHERE `login` = '$login'");
    if($users==null) {
        $db->execute("INSERT INTO `users` (`login`, `nickname`, `password`) VALUES ($login,$nickname, $password)");
//        INSERT INTO `users` (`login`, `nickname`, `password`) VALUES ("vasya@mail.ru","vasya", 123)
        $_SESSION['status'] = "Успешная регистрация. Войдите";
//        print_r('Успешная регистрация. Войдите');
        header('Location: login-form.php');

    }else{
        $_SESSION['status'] = "Ошибка регистрации логин существует!";
//        print_r('Ошибка регистрации логин существует!');
        header('Location: register-form.php');
    }

}else{
    $_SESSION['status'] = "Пароли не совпадают!";
//    print_r('Пароли не совпадают');
    header('Location: register-form.php');
}