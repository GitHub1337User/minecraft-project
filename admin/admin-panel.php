<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: index.php');
}
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-Panel Minecraft-Chest</title>
</head>
<body>

    <p><?= $_SESSION['admin']['login'];?></p>
    <a href="admin-logout.php" class="logout">Выход</a>


</body>
</html>