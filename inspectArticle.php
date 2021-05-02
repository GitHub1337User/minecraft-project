<?php include_once $_SERVER['DOCUMENT_ROOT']."/header.php";?>
<?php
//session_start();
$category = $_GET['category'];
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
$articleId= $_GET['articleId'];
$article = $db->query("SELECT articles.*, versions.version_code, categories.category_rus
        FROM articles 
        INNER JOIN versions ON articles.version_id = versions.id
        INNER JOIN categories ON articles.category_id = categories.id WHERE articles.id = :articleId ORDER BY `date_upload` DESC",array($articleId));
$imagesArticle = $db->query("SELECT * FROM images WHERE article_id=:articleId",array($articleId));
//$comments = $db->query("SELECT * FROM comments WHERE article_id=:articleId",array($articleId));



$comments = $db->query("SELECT comments.*, users.nickname
        FROM comments 
        INNER JOIN users ON comments.user_id = users.id WHERE article_id=:articleId ORDER BY `date_create` DESC",array($articleId));
//return var_dump($_SESSION);
//return var_dump($_SESSION['user']);

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




if(!empty($imagesArticle)){
    echo '<div class="slider">';
    $index = 0;
    while ($index!=count($imagesArticle)){
        echo '<div class="item">';
        echo '<img src="/uploads/'.$imagesArticle[$index]['image'].'" alt="pic">';
        echo '</div>';
        $index++;
    }
    echo '  <a class="previous" onclick="previousSlide()">&#10094;</a>
    <a class="next" onclick="nextSlide()">&#10095;</a></div>';

}

echo '<a href="'.$article[0]['download_link'].'" class="button-reg button">Скачать</a>';
echo '<div class="footer-article"><span>Категория: '.$article[0]['category_rus'].'</span> <span>Загружено: '.$article[0]['date_upload'].'</span> <span>Версия '.$article[0]['version_code'].'</span></div>';


?>
    <div class="wrap-comment">

        <?php
        if(!$_SESSION['user']){

            echo '<div class="info-comment"><a href="/login/register-form.php">Зарегистрируйтесь</a> или <a href="/login/login-form.php">войдите</a> чтобы оставлять комментарии.</div>';
        }else{
            echo ' <form action="/addComment.php" method="POST" class="comment-form">
         <label for="comment" class="label-comment">Комментарий</label>
         <input type="hidden" name="articleId" value="'.$articleId.'">
         <input type="hidden" name="userId" value="'.$_SESSION['user']['id'].'">
         <textarea name="comment" id="comment" class="area-comment">

            </textarea>
         <button type="submit" class="button-comment">Отправить</button>
            </form>';
        }


        ?>

    
        <div class="comment-zone">

            <?php

            if($comments!=null) {
                $index = 0;
                while ($index != count($comments)) {

                    echo '<div class="user">
            <img src="/res/img/avatar-holder.png" alt="">
                <h4>' . $comments[$index]['nickname'] . '</h4>
                
            </div>
            <div class="text-comment"><h5>'.$comments[$index]['date_create'].'</h5>
            ' . $comments[$index]['text'] .'</div>';
                    $index++;
                }
            }
            else{
                echo '<div class="info-comment">Комментариев нет </div>';
            }

            ?>

        </div>

    </div>
<?php

echo '</section>';

?>


<?php include_once $_SERVER['DOCUMENT_ROOT']."/footer.php";?>
