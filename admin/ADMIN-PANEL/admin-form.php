<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-menu.php'; ?>


<form class="" action="insertArticle.php" method="post" enctype="multipart/form-data">
    <?php
    if ($_SESSION['post_status']) {
        echo '<p class="msg"> ' . $_SESSION['post_status'] . ' </p>';
    }
    unset($_SESSION['post_status']);
    ?>
    <h4>Добавление в категорию:</h4>

    <input type="text" id="hidden-input" disabled name="category" placeholder="Категория заполняется автоматически">

    <input type="text" placeholder="Название" onclick="setCategory()" name="title">
    <input type="text" placeholder="Версия"  name="version">
<!--    <label for="content">Описание</label>-->
    <textarea type="text" placeholder="" name="content" id="content">
             </textarea>

    <input type="file" name="pic">

    <input type="text" placeholder="Ссылка для скачивания" name="download_link">

    <button type="submit" name="button">Добавить</button>

</form>

<!--<script src="js/categorySelect.js"></script>-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-footer.php'; ?>
