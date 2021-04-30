<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
$comment = trim($_POST['comment']);
$articleId = $_POST['articleId'];
//return var_dump($articleId);
$userId = $_POST['userId'];
//return var_dump($userId);
$db->execute("INSERT INTO `comments` (`text`,`article_id`,`user_id`) 
VALUES ( :text , :article_id,:user_id)",
    array($comment,$articleId,$userId));
header("Location: /inspectArticle.php/?articleId=".$articleId);