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
    <form action="register.php" method="POST">
        <h3>Регистрация</h3>
        <label for="login">Email</label>
        <input type="email" id="login" name="login" required>
        <label for="nickname">Nickname</label>
        <input type="text" id="nickname" name="nickname" required>
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" required>
        <label for="password-repeat">Повторите пароль</label>
        <input type="password" id="password-repeat" name="password-repeat" required>
        <button type="submit" class="button">Зарегестрироваться</button>
        <?php
        if ($_SESSION['status']) {
            echo '<p class="msg"> ' . $_SESSION['status'] . ' </p>';
        }
        unset($_SESSION['status']);
        ?>
    </form>

</div>

</body>
</html>
