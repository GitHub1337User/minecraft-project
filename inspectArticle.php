<?php include_once $_SERVER['DOCUMENT_ROOT']."/header.php";?>
<?php

$category = $_GET['category'];
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
$articleId= $_GET['articleId'];
$article = $db->query("SELECT articles.*, versions.version_code, categories.category_rus
        FROM articles 
        INNER JOIN versions ON articles.version_id = versions.id
        INNER JOIN categories ON articles.category_id = categories.id WHERE articles.id = :articleId ORDER BY `date_upload` DESC",array($articleId));
$imagesArticle = $db->query("SELECT * FROM images WHERE article_id=:articleId",array($articleId));

?>


<?php

    echo '<section class="article">
        <div class="header-article">

       <span href="/inspectArticle.php/?articleId='.$article[0]['id'].'">'.$article[0]['title'].' </span>
   </div>
    <div class="content-article">'.
        '<img src="/uploads/'.$article[0]['preview'].'" alt="pic" class="article-pic">
        <p class="description">'.$article[0]['content'].'</p>
   </div>';

    echo '<div class="slider">';


if(!empty($imagesArticle)){
    $index = 0;
    while ($index!=count($imagesArticle)){
        echo '<div class="item">';
        echo '<img src="/uploads/'.$imagesArticle[$index]['image'].'" alt="pic">';
        echo '</div>';
        $index++;
    }
}
  echo '  <a class="previous" onclick="previousSlide()">&#10094;</a>
    <a class="next" onclick="nextSlide()">&#10095;</a>
</div>';
echo '<a href="'.$article[0]['download_link'].'" class="button-reg button">Скачать</a>';
echo '<div class="footer-article"><span>Категория: '.$article[0]['category_rus'].'</span> <span>Загружено: '.$article[0]['date_upload'].'</span> <span>Версия '.$article[0]['version_code'].'</span></div>
</section>';

?>


<?php include_once $_SERVER['DOCUMENT_ROOT']."/footer.php";?>
