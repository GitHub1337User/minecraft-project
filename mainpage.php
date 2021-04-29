<?php
$category = $_GET['category'];
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
$categoryId = $db->query("SELECT * FROM `categories` WHERE category_eng=:category",array($category));
include_once $_SERVER['DOCUMENT_ROOT']."/mainpage.view.php";