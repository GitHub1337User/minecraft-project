<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-menu.php';
//$db = new Database();
$crafts = $db->query("SELECT * FROM `crafts`",array());

?>

<div class="body-crafts">
    <?php

    $index = 0;
    while ($index!=count($crafts)) {

        echo '<div class="one-craft" >
        <span class="craft-title" >'.$crafts[$index]['name'].'<div class="remote-btns"><a href="/admin/ADMIN-PANEL/deleteCraft.php/?craftId='.$crafts[$index]['id'].'" class="article-remote-btn delete-btn">&#10060;</a></div>'.'</span>
        <img src = "/uploads/'.$crafts[$index]['preview'].'" alt = "pic" draggable="false">
        <p class="description-craft" >'.$crafts[$index]['description'].'</p>
    </div >';
        $index++;
    }
    ?>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/admin/ADMIN-PANEL/admin-footer.php';?>