<?php
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
session_start();
$db = new Database();
$craftId = $_GET['craftId'];

$craft = $db->query("SELECT * FROM `crafts` WHERE id=:id",array($craftId));
unlink($_SERVER['DOCUMENT_ROOT']."/uploads/".$craft[0]['preview']);


$db->query("DELETE FROM `crafts` WHERE id=:id",array($craftId));
//$db->query("DELETE FROM `images` WHERE article_id=:id",array($articleId));

header('Location: /admin/ADMIN-PANEL/admin-crafts.php');