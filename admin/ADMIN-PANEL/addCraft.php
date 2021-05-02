<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/UploadPic.php';
$db = new Database();
$uploadPic = new UploadPic();

$title = $_POST['title'];

$descr = $_POST['descr'];

$preview = $uploadPic->upload($_FILES['pic']);

$version = $_POST['version'];

$idVersion = $db->query("SELECT * FROM `versions` WHERE `version_code` = :version",array($version));
//articles_table == category_id,title,content,preview,download_link,version_id
$db->execute("INSERT INTO `crafts` (`name`,`description`,`version_id`,`preview`) 
VALUES ( :title,:descr,:version_id ,:preview )",
    array($title,$descr,$idVersion[0]['id'],$preview));

$_SESSION['post_status'] = "Крафт добавлен";
header('Location: admin-form-craft.php');