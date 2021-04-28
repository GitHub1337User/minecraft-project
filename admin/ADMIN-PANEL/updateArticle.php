<?php
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/UploadPic.php';
session_start();

$db = new Database();
$uploadPic = new UploadPic();

$articleId = $_POST['articleId'];

$category = $_POST['category'];
//var_dump($category);

$title = $_POST['title'];

$content = $_POST['content'];
$oldPic = $db->query("SELECT * FROM `articles` WHERE id =:articleId",array($articleId));
    if($_FILES['preview']==null) {

        $preview = $oldPic[0]['preview'];
    }
    else {
        unlink($_SERVER['DOCUMENT_ROOT']."/uploads/".$oldPic[0]['preview']);
        $preview = $uploadPic->upload($_FILES['preview']);
    }


$download_link = $_POST['download_link'];

$version = $_POST['version'];

$idCategory = $db->query("SELECT * FROM `categories` WHERE `category_eng` = :category",array($category));
//var_dump($idCategory);


$idVersion = $db->query("SELECT * FROM `versions` WHERE `version_code` = :version",array($version));
//var_dump($idVersion);
//articles_table == category_id,title,content,preview,download_link,version_id
//$db->execute("UPDATE `articles` SET (`category_id`,`title`,`content`,`preview`,`download_link`,`version_id`)
//VALUES ( :category_id , :title,:content,:preview, :download_link , :version_id ) WHERE articles.id=:id",
//    array($idCategory[0]['id'],$title,$content,$preview,$download_link,$idVersion[0]['id'],$articleId));
//return var_dump($_POST);
$db->execute("UPDATE articles SET category_id=:category_id,title=:title,content=:content,preview=:preview,download_link=:link,
                    version_id=:version WHERE articles.id=:id ",
    array(
        'category_id'=>$idCategory[0]['id'],
        'title'=>$title,
        'content'=>$content,
        'preview'=>$preview,
        'link'=>$download_link,
        'version'=>$idVersion[0]['id'],
        'id'=>$articleId

    ));
//$db->query("UPDATE `articles` SET `category_id`=:category_id",array(1));
//$db->execute("UPDATE articles SET category_id=?",array(1));

//UPDATE goods SET title = "утюг", price = 300 WHERE num = 2

//$db->execute("UPDATE articles SET category_id=?",array(1));

$_SESSION['post_status'] = "Артикль обновлен";
header('Location: admin-form-pic.php');