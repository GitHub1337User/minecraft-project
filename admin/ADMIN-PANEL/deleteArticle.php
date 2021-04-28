<?php
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
session_start();
$db = new Database();
$articleId = $_GET['articleId'];
$article = $db->query("SELECT * FROM `articles` WHERE id=:id",array($articleId));
//var_dump($article);
unlink($_SERVER['DOCUMENT_ROOT']."/uploads/".$article[0]['preview']);
//var_dump($article[0]['preview']);
$db->query("DELETE FROM `articles` WHERE id=:id",array($articleId));
$articlePics = $db->query("SELECT * FROM `images` WHERE article_id=:id",array($articleId));
for($i=0;$i!=count($articlePics);$i++){
    unlink($_SERVER['DOCUMENT_ROOT']."/uploads/".$articlePics[$i]['image']);
}
$db->query("DELETE FROM `images` WHERE article_id=:id",array($articleId));

header('Location: admin-articles.php');