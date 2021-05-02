<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-menu.php';
$queryType = $_GET['queryType'];
$category = $queryType;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page=1;
}

$articlesOnPage = 2;

$from = ($page-1)*$articlesOnPage;
if ($queryType=="all") {

    $articles = $db->query("SELECT articles.*, versions.version_code, categories.category_rus
        FROM articles INNER JOIN versions ON articles.version_id = versions.id
        INNER JOIN categories ON articles.category_id = categories.id ORDER BY `date_upload` DESC LIMIT $articlesOnPage OFFSET $from",array());
    $countArticles = $db->query("SELECT COUNT(*) as count FROM `articles`",array());
//    return var_dump($countArticles);
}
else{
    $categoryId = $db->query("SELECT * FROM `categories` WHERE `category_eng`=:category",array($queryType));
;
    $articles = $db->query("SELECT articles.*, versions.version_code, categories.category_rus
        FROM articles 
        INNER JOIN versions ON articles.version_id = versions.id
        INNER JOIN categories ON articles.category_id = categories.id WHERE category_id = :category ORDER BY `date_upload` DESC LIMIT $articlesOnPage OFFSET $from",array($categoryId[0]['id']));
    $countArticles = $db->query("SELECT COUNT(*) as count FROM `articles` WHERE category_id = :category",array($categoryId[0]['id']));
}

//return var_dump($countArticles[0]['count']);

$count = $countArticles[0]['count'];

$pagesCount = ceil($count/$articlesOnPage);
function links($category,$page,$i){
    if($page==$i){
        return '<a href="/admin/ADMIN-PANEL/admin-articles.php/?queryType='.$category.'&page='.$i.'" class="button active-btn-page">'.$i.'</a>';
    }
    else{
        return  '<a href="/admin/ADMIN-PANEL/admin-articles.php/?queryType='.$category.'&page='.$i.'" class="button">'.$i.'</a>';
    }
}
function pagination($pagesCount, $page,$category){
    $pageToRender = 5;
    $tmp = 4;
    if($pagesCount < $pageToRender) {
        foreach(range(1,$pagesCount) as $i){
            echo links($category,$page,$i);
        }
    }else if($pagesCount > $tmp && $page < $pageToRender){
        foreach(range(1, $pageToRender) as $i){
            echo links($category,$page,$i);
        }
    }else  if($pagesCount - $pageToRender < $pageToRender && $page > $pageToRender && $pagesCount - $pageToRender > 0){
        foreach(range($pagesCount - $tmp, $pagesCount) as $i){
            echo links($category,$page,$i);
        }
    }else if($pagesCount > $tmp && $pagesCount - $pageToRender < $pageToRender && $page == $pageToRender){
        foreach(range($page-2, $pagesCount) as $i) {
            echo links($category,$page,$i);
        }
    }else  if($pagesCount > $tmp && $pagesCount-$pageToRender > $pageToRender && $page >=$pageToRender && $page <= $pagesCount-$tmp){
        foreach(range($page-2, $page+2) as $i){
            echo links($category,$page,$i);
        }
    }else if($pagesCount > $tmp && $pagesCount-$pageToRender > $pageToRender && $page > $pagesCount-4){
        foreach(range($pagesCount-$tmp, $pagesCount) as $i){
            echo links($category,$page,$i);
        }
    }
}


?>
<h4>Категория артиклей: <?=$queryType?></h4>


<?php $index = 0;
    while($index!=count($articles)){

        echo '<section class="article">
        <div class="header-article">

      <a href="#">'.$articles[$index]['title'].' </a> <div class="remote-btns"><a href="/admin/ADMIN-PANEL/admin-form-edit.php/?articleId='.$articles[$index]['id'].'" class="article-remote-btn">&#9998;</a><a href="/admin/ADMIN-PANEL/deleteArticle.php/?articleId='.$articles[$index]['id'].'&q='.$queryType.'" class="article-remote-btn delete-btn">&#10060;</a></div>
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
    echo '<a href="/admin/ADMIN-PANEL/admin-articles.php/?queryType='.$category.'&page='.$prev.'" class="button"><<</a>';
}
pagination($pagesCount, $page,$category);
if($page!=$pagesCount){
    $next =$page+1;

    echo '<a href="/admin/ADMIN-PANEL/admin-articles.php/?queryType='.$category.'&page='.$next.'" class="button ">>></a>';
}
echo '</div>';
 ?>



<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-footer.php';?>

















