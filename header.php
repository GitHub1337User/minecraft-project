<?php session_start();?>
<!doctype html>
<html>
<head>


    <link rel="shortcut icon" href="/res/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/mainpage.css">
    <link rel="stylesheet" href="/css/article.css">
    <link rel="stylesheet" href="/css/burger.css">
    <link rel="stylesheet" href="/css/slider.css">
    <link rel="stylesheet" href="/css/commentform.css">
    <link rel="stylesheet" href="/css/crafts.css">

<!--    <link rel="stylesheet" href="/css/footer.css">-->
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minecraft-Chest</title>
</head>
<body>
<header>

    <!--    <img src="res/img/logo-site.png" alt="" class="site-logo" draggable="false">-->
    <a  href="/index.php" class="site-logo">
        <img src="/res/img/favicon.png" alt="" class="pic-logo blick"><h1>MINECRAFT  CHEST</h1>
    </a>

    <nav class="buttons sidenav" id="mySidenav">
        <div class="menu-btn">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="/mainpage.php/?category=mods" class="button">Моды</a>
            <a href="/mainpage.php/?category=textures" class="button">Текстурпаки</a>
            <a href="/mainpage.php/?category=skins" class="button">Скины</a>
            <a href="/mainpage.php/?category=maps" class="button">Карты</a>
            <a href="/crafts.php" class="button">Крафты</a>

        </div>

        <div class="user-btn">

            <?php if (!$_SESSION['user']) {

                echo '<a href = "/login/login-form.php" class="button button-login" > Авторизация</a >';
                echo '<a href = "/login/register-form.php" class="button button-reg" > Регистрация</a >';
            }
            else {
                echo  '<span class="button button-login" style="color:white;">'.$_SESSION['user']['login'].'</span>';
                echo '<a href = "/login/user-logout.php" class="button button-out" >Выход</a >';

            };
            ?>
        </div>
    </nav>
    <span class="button-burger" onclick="openNav()">☰</span>


</header>