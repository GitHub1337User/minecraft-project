<?php session_start();?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Регистрация: Minecraft chest</title>
</head>
<body>
<!-- Форма авторизации -->

<div class="container">
    <form action="login.php" method="POST">
        <h3>Авторизация</h3>
        <label for="login">Email</label>
        <input type="email" id="login" name="login" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" class="button">Войти</button>
        <?php
        if ($_SESSION['status']) {
//            echo '<p class="msg"> ' . $_SESSION['status'] . ' </p>';
//            echo '<p class="'.$_SESSION['msgType'].'"'. $_SESSION['status'] . '</p>';
            echo  "<p class=".$_SESSION['msgType'].">".$_SESSION['status'] . '</p>';
        }
        unset($_SESSION['status']);
        unset($_SESSION['msgType']);
        ?>
    </form>

</div>

</body>
</html>
