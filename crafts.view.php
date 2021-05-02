<?php include_once $_SERVER['DOCUMENT_ROOT']."/header.php";?>


<div class="body-crafts">
    <?php

    $index = 0;
    while ($index!=count($crafts)) {

        echo '<div class="one-craft" >
        <span class="craft-title" >'.$crafts[$index]['name'].'</span>
        <img src = "/uploads/'.$crafts[$index]['preview'].'" alt = "pic" draggable="false">
        <p class="description-craft" >'.$crafts[$index]['description'].'</p>
    </div >';
    $index++;
    }
      ?>
</div>




<?php include_once $_SERVER['DOCUMENT_ROOT']."/footer.php";?>
