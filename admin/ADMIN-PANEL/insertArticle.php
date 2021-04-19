<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
$category = $_POST['category '];
$name = $_POST['name'];
$content = $_POST['content'];
$preview=$_POST['pic'];

//$admins = $db->query("SELECT * FROM `admin` WHERE `login` = :login AND `password` = :password",array($login,$password));
$idCategory = $db->query("SELECT * FROM `categories` WHERE `name` = :name",array($name));
$db->execute("INSERT INTO `articles` (`content`, `preview`) 
VALUES (:content, :preview)",array($content,$preview));


//$sql="SELECT r.id, r.author_id, r.product_id, text, created_at, ri.image,
//       u.login,u.image as user_image FROM users u INNER JOIN reviews r on r.author_id = u.id INNER JOIN reviews_imgs ri ON r.id = ri.review_id'";