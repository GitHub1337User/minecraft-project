<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-menu.php';
$articleId = $_GET['articleId'];

$editingArticle = $db->query("SELECT articles.*, versions.version_code, categories.category_rus
        FROM articles 
        INNER JOIN versions ON articles.version_id = versions.id
        INNER JOIN categories ON articles.category_id = categories.id WHERE articles.id = :id",array($articleId));
?>


<form class="" action="/admin/ADMIN-PANEL/updateArticle.php" method="post" enctype="multipart/form-data">
    <?php
//    if ($_SESSION['post_status']) {
//        echo '<p class="msg"> ' . $_SESSION['post_status'] . ' </p>';
//    }
//    unset($_SESSION['post_status']);

    $categories = $db->query("SELECT * FROM `categories`",array());
    $versions = $db->query("SELECT * FROM `versions`",array());
    $nowCategory = $db->query("SELECT * FROM `categories` WHERE category_rus = :category_rus",array($editingArticle[0]['category_rus']));
//    var_dump($editingArticle[0]['category_rus']);
    ?>
    <h4>Изменение артикля:</h4>
    <input type="hidden" value="<?=$articleId?>" name="articleId">
    <?php echo '<span>Категория поста:'.$editingArticle[0]['category_rus'] .'</span>';?>
    <select name="category" id="">
        <option><?=$nowCategory[0]['category_eng']?></option>
        <?php   $index=0;
                while ($index!=count($categories)) {
                        echo "<option>" . $categories[$index]['category_eng'] . "</option>";
                        $index++;
                }
        ?>
    </select>
    <span>Тайтл</span>
    <input type="text" placeholder="Название" name="title" value="<?=$editingArticle[0]['title']?>">
<!--    <img src="/uploads/'.$articles[$index]['preview'].'" alt="pic" class="article-pic">-->

    <?php echo '<span>Версия:'.$editingArticle[0]['version_code'] .'</span>';?>
    <select name="version" id="">
        <option><?=$editingArticle[0]['version_code']?></option>
        <?php   $index=0;
        while ($index!=count($versions)) {
            echo "<option>" . $versions[$index]['version_code'] . "</option>";
            $index++;
        }
        ?>
    </select>
<!--    <label for="content">Описание</label>-->
    <textarea type="text" placeholder="" name="content" id="content"> <?=$editingArticle[0]['content']?></textarea>
    <img src="/uploads/<?=$editingArticle[0]['preview']?>" alt="pic" class="article-pic" style="min-width: 250px">
<!--    <input type="file" name="preview" value="--><?//=$editingArticle[0]['preview']?><!--">-->
    <input type="file" name="preview">

    <input type="text" placeholder="Ссылка для скачивания" name="download_link" value="<?=$editingArticle[0]['download_link']?>">

    <button type="submit" name="button">Обновить</button>

</form>

<!--<script src="js/categorySelect.js"></script>-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-footer.php'; ?>
