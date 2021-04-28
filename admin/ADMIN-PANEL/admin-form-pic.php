<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-menu.php';
$articleId = $db->query("SELECT * FROM articles WHERE  date_upload = (select max(date_upload) from articles)",array());
//var_dump($articleId);
?>


    <form class="" action="/admin/ADMIN-PANEL/addPicsArticle.php" method="post" enctype="multipart/form-data">
        <?php
        if ($_SESSION['post_status']) {
            echo '<p class="msg"> ' . $_SESSION['post_status'] . ' </p>';
        }
        unset($_SESSION['post_status']);

        ?>
        <h4>Добавьте доп. картинки:</h4>

        <input type="file" name="pics[]" multiple>
        <input type="hidden" name="id" value="<?=$articleId[0]['id']?>">


        <button type="submit" name="button">Добавить</button>
        <a href="/admin/ADMIN-PANEL/admin-panel.php" class="not-load">Продолжить без добавления</a>

    </form>

    <!--<script src="js/categorySelect.js"></script>-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-footer.php'; ?>