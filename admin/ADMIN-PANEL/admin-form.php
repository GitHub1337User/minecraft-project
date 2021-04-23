<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-menu.php'; ?>


<form class="" action="insertArticle.php" method="post" enctype="multipart/form-data">
    <?php
    if ($_SESSION['post_status']) {
        echo '<p class="msg"> ' . $_SESSION['post_status'] . ' </p>';
    }
    unset($_SESSION['post_status']);
//    require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
//    $db = new Database();
    $categories = $db->query("SELECT * FROM `categories`",array());
    $versions = $db->query("SELECT * FROM `versions`",array());
    ?>
    <h4>Добавление в категорию:</h4>

<!--    <input type="text" id="hidden-input"  name="category" placeholder="Категория заполняется автоматически">-->
    <select name="category" id="">
        <?php   $index=0;
                while ($index!=count($categories)) {
                        echo "<option>" . $categories[$index]['category_eng'] . "</option>";
                        $index++;
                }
        ?>
    </select>
    <input type="text" placeholder="Название" name="title">
    <select name="version" id="">
        <?php   $index=0;
        while ($index!=count($versions)) {
            echo "<option>" . $versions[$index]['version_code'] . "</option>";
            $index++;
        }
        ?>
    </select>
<!--    <label for="content">Описание</label>-->
    <textarea type="text" placeholder="" name="content" id="content">
             </textarea>

    <input type="file" name="preview">

    <input type="text" placeholder="Ссылка для скачивания" name="download_link">

    <button type="submit" name="button">Добавить</button>

</form>

<!--<script src="js/categorySelect.js"></script>-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-footer.php'; ?>
