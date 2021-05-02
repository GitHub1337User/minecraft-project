

<?php include_once $_SERVER['DOCUMENT_ROOT']."/header.php";?>
<?php $index =0;
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
echo '<div class="links-page">';
if($page!=1){
    $prev =$page-1;
    echo '<a href="/mainpage.php/?category='.$category.'&page='.$prev.'" class="button pagintation-link"><<</a>';
}
//for($i=1;$i<=$pagesCount; $i++){
//    if($page==$i){
//        echo '<a href="/mainpage.php/?category='.$category.'&page='.$i.'" class="button  pagintation-link active-btn-page">'.$i.'</a>';
////        echo '<a href="/mainpage.php/?category='.$category.'?page='.$i.'" class="button active-btn-page">'.$i.'</a>';
////        echo '<a href="?category='.$category.'?page='.$i.'" class="button active-btn-page">'.$i.'</a>';
//    }
//    else{
//        echo '<a href="/mainpage.php/?category='.$category.'&page='.$i.'" class="button  pagintation-link">'.$i.'</a>';
//    }
//}
pagination($pagesCount, $page,$category);
if($page!=$pagesCount){
    $next =$page+1;

    echo '<a href="/mainpage.php/?category='.$category.'&page='.$next.'" class="button  pagintation-link">>></a>';
}
echo '</div>';

?>


<?php include_once $_SERVER['DOCUMENT_ROOT']."/footer.php";?>