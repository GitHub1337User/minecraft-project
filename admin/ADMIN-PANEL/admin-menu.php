<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: ../index.php');
}
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
$categories = $db->query("SELECT * FROM `categories`",array());

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/admin/ADMIN-PANEL/css/burger-admin.css">
    <link rel="stylesheet" href="/admin/ADMIN-PANEL/css/accordion.css">
    <link rel="stylesheet" href="/admin/ADMIN-PANEL/css/form.css">
    <link rel="stylesheet" href="/admin/ADMIN-PANEL/css/admin-menu.css">

    <title>Admin-Panel Minecraft-Chest</title>
</head>
<body>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

    <a href="/admin/ADMIN-PANEL/admin-panel.php" class="logged-user"><?= $_SESSION['admin']['login'];?></a>
    <a href="../admin-logout.php" class="logout">Выход &#128682;</a>

    <?php   $index=0;
    while ($index!=count($categories)) {
        echo '<button class="accordion">'.$categories[$index]['category_rus'].'</button>
    <div class="panel">'.
        '<a href="/admin/ADMIN-PANEL/admin-form.php" id="'.$categories[$index]['category_eng'].'" class="category">Добавить</a>
        <a href="#">Изменить</a>
        <a href="#">Удалить</a>
    </div>';
        $index++;
    }
    ?>



<!--    <button class="accordion">Моды</button>-->
<!--    <div class="panel">-->
<!--        <a href="admin-form.php" id="mods" class="category">Добавить</a>-->
<!--        <a href="#">Изменить</a>-->
<!--        <a href="#">Удалить</a>-->
<!--    </div>-->
<!---->
<!--    <button class="accordion">Текстурпаки</button>-->
<!--    <div class="panel">-->
<!--        <a href="admin-form.php" id="textures" class="category">Добавить</a>-->
<!--        <a href="#">Изменить</a>-->
<!--        <a href="#">Удалить</a>-->
<!--    </div>-->
<!---->
<!--    <button class="accordion">Скины</button>-->
<!--    <div class="panel">-->
<!--        <a href="admin-form.php" id="skins" class="category">Добавить</a>-->
<!--        <a href="#">Изменить</a>-->
<!--        <a href="#">Удалить</a>-->
<!--    </div>-->
<!---->
<!--    <button class="accordion">Карты</button>-->
<!--    <div class="panel">-->
<!--        <a href="admin-form.php" id="maps" class="category">Добавить</a>-->
<!--        <a href="#">Изменить</a>-->
<!--        <a href="#">Удалить</a>-->
<!--    </div>-->

    <!-- <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a> -->
</div>
<div class="top-el"><span  class="burger-btn" onclick="openNav()">☰</span>    <h2>Minecraft-Chest Admin Panel</h2></div>

<main id="main">
    <div class="main-container">