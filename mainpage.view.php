

<?php include_once $_SERVER['DOCUMENT_ROOT']."/header.php";?>
<?php $index = 0;
while($index!=count($articles)){

    echo '<section class="article">
        <div class="header-article">

       <a href="/inspectArticle.php/?articleId='.$articles[$index]['id'].'">'.$articles[$index]['title'].' </a>
   </div>
    <div class="content-article">'.
        '<img src="/uploads/'.$articles[$index]['preview'].'" alt="pic" class="article-pic">
        <p class="description">'.$articles[$index]['content'].'</p>
   </div>

    <div class="footer-article"><span>Категория: '.$articles[$index]['category_rus'].'</span> <span>Загружено: '.$articles[$index]['date_upload'].'</span> <span>Версия '.$articles[$index]['version_code'].'</span></div>
</section>';


    $index++;
}
?>


<?php include_once $_SERVER['DOCUMENT_ROOT']."/footer.php";?>