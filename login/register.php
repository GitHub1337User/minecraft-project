<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/validateReg.php';
$db = new Database();

//login == email
$login = $_POST['login'];
//return var_dump($login);
$nickname = $_POST['nickname'];
$password = $_POST['password'];
$password_repeat = $_POST['password-repeat'];
$validate = new ValidateReg($password,$login);

if($validate->checkEmail() && $validate->checkPassword()) {
    if ($password === $password_repeat) {


        $users = $db->query("SELECT * FROM `users` WHERE `login` = :login", array($login));

        if ($users == null) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $db->execute("INSERT INTO `users` (`login`, `nickname`, `password`) VALUES (:login,:nickname, :password)", array($login, $nickname, $password));
//        INSERT INTO `users` (`login`, `nickname`, `password`) VALUES ("vasya@mail.ru","vasya", 123)
            $_SESSION['status'] = "Успешная регистрация. Войдите";
            $_SESSION['msgType'] = "msg-good";
            header('Location: login-form.php');

        } else {
            $_SESSION['status'] = "Ошибка регистрации логин существует!";
            $_SESSION['msgType'] = "msg-bad";
            header('Location: register-form.php');
        }

    } else {
        $_SESSION['status'] = "Пароли не совпадают!";
        $_SESSION['status'] = "msg-bad";
        header('Location: register-form.php');
    }
}
else{
    header('Location: register-form.php');
}