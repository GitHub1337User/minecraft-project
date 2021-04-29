<?php
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
session_start();
$db = new Database();
$articleId = $_GET['articleId'];

$article = $db->query("SELECT * FROM `articles` WHERE id=:id",array($articleId));
unlink($_SERVER['DOCUMENT_ROOT']."/uploads/".$article[0]['preview']);


$articlePics = $db->query("SELECT * FROM `images` WHERE article_id=:article_id",array($articleId));

//return var_dump($articlePics);
for($i=0;$i!=count($articlePics);$i++){

    unlink($_SERVER['DOCUMENT_ROOT']."/uploads/".$articlePics[$i]['image']);
}
$db->query("DELETE FROM `articles` WHERE id=:id",array($articleId));
//$db->query("DELETE FROM `images` WHERE article_id=:id",array($articleId));
//
header('Location: /admin/ADMIN-PANEL/admin-articles.php/?queryType='.$_GET["q"]);
//header('Location: admin-articles.php');