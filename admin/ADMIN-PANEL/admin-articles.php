<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-menu.php';
$queryType = $_GET['queryType'];
//var_dump($queryType);
//$db =
if ($queryType=="all") {
    $articles = $db->query("SELECT * FROM `articles`", array());
}
else{
    $categoryId = $db->query("SELECT * FROM `categories` WHERE `category_eng`=:category",array($queryType));
    $articles = $db->query("SELECT * FROM `articles` WHERE `category_id` = :category",array($categoryId[0]['id']));
}
//var_dump($articles);
?>
<h4>Категория артиклей: <?=$queryType?></h4>

<!--<pre>-->
<!--    --><?php
//        $index=0;
//        while ($index!=count($articles))
//        {
//            print_r($articles[$index]);
//            $index++;
//        }
//
//            ?>
<!--</pre>-->
<img src="<?=$articles[0]['preview']?>" alt="">










<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-footer.php';?>

















