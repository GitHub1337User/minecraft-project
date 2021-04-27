<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-menu.php';
$queryType = $_GET['queryType'];
//var_dump($queryType);
//$db =
if ($queryType=="all") {
    $articles = $db->query("SELECT * FROM `articles`", array());
}
else{
    $categoryId = $db->query("SELECT * FROM `categories` WHERE `category_eng`=:category",array($queryType));
//    var_dump($categoryId);
    $articles = $db->query("SELECT * FROM `articles` WHERE `category_id` = :category",array($categoryId[0]['id']));
//    var_dump($articles);
}
//var_dump($articles);
?>
<h4>Категория артиклей: <?=$queryType?></h4>


<?php $index = 0;
    while($index!=count($articles)){
        echo '<img src="/uploads/'.$articles[$index]['preview'].'" width="100px" height="100px">';
        $index++;
    }
 ?>











<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-footer.php';?>

















