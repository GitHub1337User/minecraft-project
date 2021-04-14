<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-menu.php'; ?>


<form class="" action="insertArticle.php" method="post" enctype="multipart/form-data">

    <h4>Добавление в категорию:</h4>

    <input type="text" id="hidden-input" disabled name="category">

    <input type="text" placeholder="Название" onclick="setCategory()" name="name">

    <textarea type="text" placeholder="">
             </textarea>

    <input type="file">

    <button type="submit" name="button">Добавить</button>

</form>

<!--<script src="js/categorySelect.js"></script>-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-footer.php'; ?>
