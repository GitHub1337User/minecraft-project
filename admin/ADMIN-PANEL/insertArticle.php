<?php
session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/UploadPic.php';

$db = new Database();
$uploadPic = new UploadPic();

$category = $_POST['category'];
//var_dump($category);

$title = $_POST['title'];

$content = $_POST['content'];

$preview = $uploadPic->upload($_FILES['preview']);
//var_dump($_FILES);
//var_dump($_FILES['preview']);
$download_link = $_POST['download_link'];

$version = $_POST['version'];

//$admins = $db->query("SELECT * FROM `admin` WHERE `login` = :login AND `password` = :password",array($login,$password));
$idCategory = $db->query("SELECT * FROM `categories` WHERE `category_eng` = :category",array($category));
//var_dump($idCategory);

$idVersion = $db->query("SELECT * FROM `versions` WHERE `version_code` = :version",array($version));
//articles_table == category_id,title,content,preview,download_link,version_id
$db->execute("INSERT INTO `articles` (`category_id`,`title`,`content`,`preview`,`download_link`,`version_id`) 
VALUES ( :category_id , :title,:content,:preview, :download_link , :version_id )",
    array($idCategory[0]['id'],$title,$content,$preview,$download_link,$idVersion[0]['id']));

$_SESSION['post_status'] = "Артикль добавлен";
header('Location: admin-form-pic.php');


//$sql="SELECT r.id, r.author_id, r.product_id, text, created_at, ri.image,
//       u.login,u.image as user_image FROM users u INNER JOIN reviews r on r.author_id = u.id INNER JOIN reviews_imgs ri ON r.id = ri.review_id'";