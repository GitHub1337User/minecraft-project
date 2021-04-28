<?php
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/UploadPic.php';
session_start();

$db = new Database();
$uploadPic = new UploadPic();

$pics = $_FILES['pics'];

    if(count($pics['name'])!=1) {
        $tmp=[];
        foreach ($pics as $key => $value) {
            for ($i = 0; $i != count($pics[$key]); $i++) {
//              print_r($pics[$key][$i]);
                $tmp[$key]=$value[$i];

            }
            echo '<pre>';
            print_r($tmp);
            echo '</pre>';
            $dbPic = $uploadPic->upload($_FILES['preview']);
        }
    }
    else{

    }
//    echo "{$key} => {$value} ";

//    echo "<hr>";
//    echo '<pre>';
//    print_r($pics);
//    echo '</pre>';
