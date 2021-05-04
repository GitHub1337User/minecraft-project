<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-menu.php';?>


<div class="admin-menu">
    <a href="admin-articles.php/?queryType=all" class="menu-point">Просмотр артиклей</a>
    <a href="admin-form-craft.php" class="menu-point">Добавить крафт</a>
    <a href="admin-crafts.php" class="menu-point">Просмотр - крафты</a>
    <a href="admin-articles.php/?queryType=mods" class="menu-point ">Просмотр артиклей - Моды</a>
    <a href="admin-articles.php/?queryType=skins" class="menu-point ">Просмотр артиклей - Скины</a>
    <a href="admin-articles.php/?queryType=maps" class="menu-point ">Просмотр артиклей - Карты</a>
    <a href="admin-articles.php/?queryType=textures" class="menu-point ">Просмотр артиклей - Текстурпаки</a>
</div>


<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-footer.php';?>
