<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-menu.php';
//$articleId = $db->query("SELECT * FROM articles WHERE  date_upload = (select max(date_upload) from articles)",array());
//var_dump($articleId);
//$versions = $db->query("SELECT * FROM `versions`",array());
?>


    <form class="" action="/admin/ADMIN-PANEL/addCraft.php" method="post" enctype="multipart/form-data">
        <?php
        if ($_SESSION['post_status']) {
            echo '<p class="msg"> ' . $_SESSION['post_status'] . ' </p>';
        }
        unset($_SESSION['post_status']);
        //    require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
        //    $db = new Database();
        $versions = $db->query("SELECT * FROM `versions`",array());
        ?>
        <h4>Добавление крафта:</h4>

        <input type="text" placeholder="Название" name="title">
        <input type="file" name="pic">
        <select name="version" id="">
            <?php   $index=0;
            while ($index!=count($versions)) {
                echo "<option>" . $versions[$index]['version_code'] . "</option>";
                $index++;
            }
            ?>
        </select>
        <!--    <label for="content">Описание</label>-->
        <textarea type="text" placeholder="" name="descr" id="content">
             </textarea>
<!--        <input type="hidden" name="id" value="--><?//=$articleId[0]['id']?><!--">-->


        <button type="submit" name="button">Добавить</button>

    </form>

    <!--<script src="js/categorySelect.js"></script>-->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/ADMIN-PANEL/admin-footer.php'; ?>