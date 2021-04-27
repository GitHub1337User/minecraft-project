<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-menu.php';
$queryType = $_GET['queryType'];
//var_dump($queryType);
//$db =
if ($queryType=="all") {
//    $articles = $db->query("SELECT * FROM `articles` ORDER BY `date_upload` DESC", array());

    $articles = $db->query("SELECT articles.*, versions.version_code, categories.category_rus
        FROM articles INNER JOIN versions ON articles.version_id = versions.id
        INNER JOIN categories ON articles.category_id = categories.id ORDER BY `date_upload` DESC",array());
}
else{
    $categoryId = $db->query("SELECT * FROM `categories` WHERE `category_eng`=:category",array($queryType));
//    var_dump($categoryId);
//    $articles = $db->query("SELECT * FROM articles WHERE `category_id` = :category ORDER BY `date_upload` DESC",array($categoryId[0]['id']));
    $articles = $db->query("SELECT articles.*, versions.version_code, categories.category_rus
        FROM articles 
        INNER JOIN versions ON articles.version_id = versions.id
        INNER JOIN categories ON articles.category_id = categories.id WHERE category_id = :category ORDER BY `date_upload` DESC",array($categoryId[0]['id']));


//    var_dump($articles);
}



?>
<h4>Категория артиклей: <?=$queryType?></h4>


<?php $index = 0;
    while($index!=count($articles)){
//
        echo '<section class="article">
        <a href="#" class="header-article">

       <h3>'.$articles[$index]['title'].'</h3>
   </a>
    <div class="content-article">'.
    '<img src="/uploads/'.$articles[$index]['preview'].'" alt="pic" class="article-pic">
        <p class="description">'.$articles[$index]['content'].'</p>
   </div>

    <div class="footer-article"><span>Категория: '.$articles[$index]['category_rus'].'</span> <span>Загружено: '.$articles[$index]['date_upload'].'</span> <span>Версия '.$articles[$index]['version_code'].'</span></div>
</section>';


        $index++;
    }
 ?>



<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-footer.php';?>

















