<?php session_start();?>
<!doctype html>
<html>
<head>
    <link rel="shortcut icon" href="/res/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/mainpage.css">
    <link rel="stylesheet" href="/css/article.css">
    <link rel="stylesheet" href="/css/burger.css">
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
        <img src="res/img/favicon.png" alt="" class="pic-logo blick"><h1>MINECRAFT  CHEST</h1>
    </a>

    <nav class="buttons sidenav" id="mySidenav">
        <div class="menu-btn">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="/123mainpage.php" class="button">Моды</a>
        <a href="/1234mainpage.php" class="button">Текстурпаки</a>
        <a href="/12345mainpage.php" class="button">Скины</a>
            <a href="/123456mainpage.php" class="button">Карты</a>

        </div>

        <div class="user-btn">
        <?php if (!$_SESSION['user']) {

            echo '<a href = "/login/login-form.php" class="button button-login" > Авторизация</a >';
            echo '<a href = "/login/register-form.php" class="button button-reg" > Регистрация</a >';
            }
            else echo '<a href = "/login/user-logout.php" class="button button-out" >Выход</a >';
        ?>
        </div>
    </nav>
    <span class="button-burger" onclick="openNav()">☰</span>


</header>


<section class="article">
    <a href="#" class="header-article">

       <h3>Faithful 32x32</h3>
   </a>
    <div class="content-article">
        <img src="/uploads/img.png" alt="pic" class="article-pic">
        <p class="description">Ресурспак со стандартными текстурами майнкрафт увеличенными в 2 раза.</p>
   </div>

    <div class="footer-article"><span>Категория: Тестурпаки</span> <span>Загружено: 21-04-2021</span> <span>Версия 1.16</span></div>
</section>



<!--'<section class="article">-->
<!--    <div class="header-article">-->
<!---->
<!--        <a href="#">'.$articles[$index]['title'].' </a>-->
<!--    </div>-->
<!--    <div class="content-article">'.-->
<!--        '<img src="/uploads/'.$articles[$index]['preview'].'" alt="pic" class="article-pic">-->
<!--        <p class="description">'.$articles[$index]['content'].'</p>-->
<!--    </div>-->
<!---->
<!--    <div class="footer-article"><span>Категория: '.$articles[$index]['category_rus'].'</span> <span>Загружено: '.$articles[$index]['date_upload'].'</span> <span>Версия '.$articles[$index]['version_code'].'</span></div>-->
<!--</section>';-->


<script src="/js/burger-menu.js"></script>
</body>
</html>