<?php
session_start();
$category = $_GET['category'];
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
$categoryId = $db->query("SELECT * FROM `categories` WHERE category_eng=:category",array($category));
$articles = $db->query("SELECT articles.*, versions.version_code, categories.category_rus
        FROM articles 
        INNER JOIN versions ON articles.version_id = versions.id
        INNER JOIN categories ON articles.category_id = categories.id WHERE category_id = :category ORDER BY `date_upload` DESC",array($categoryId[0]['id']));
//session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/mainpage.view.php";