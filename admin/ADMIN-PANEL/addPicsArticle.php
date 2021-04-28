<?php
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/UploadPic.php';
session_start();

$db = new Database();
$uploadPic = new UploadPic();

//$pics = $_FILES['pics'];
$idArticle = $_POST['id'];

if ($_FILES) {
    foreach ($_FILES["pics"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["pics"]["tmp_name"][$key];
            $name =  rand(0,100).time(). rand(0,100) . $_FILES["pics"]["name"][$key];
            $path = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$name;
            move_uploaded_file($tmp_name, $path);
            $db->execute("INSERT INTO `images` (`article_id`,`image`) VALUES ( :article_id , :image )",
                array($idArticle,$name));
        }
    }
    header('Location: admin-form.php');
}

