<?php
session_start();
$category = $_GET['category'];
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page=1;
}
//var_dump($_GET['category']);
$articlesOnPage = 2;

$from = ($page-1)*$articlesOnPage;

$categoryId = $db->query("SELECT * FROM `categories` WHERE category_eng=:category",array($category));
$articles = $db->query("SELECT articles.*, versions.version_code, categories.category_rus
        FROM articles
        INNER JOIN versions ON articles.version_id = versions.id
        INNER JOIN categories ON articles.category_id = categories.id WHERE category_id = :category ORDER BY `date_upload` DESC LIMIT $articlesOnPage OFFSET $from",array($categoryId[0]['id']));
//return var_dump(count($articles));
$countArticles = $db->query("SELECT COUNT(*) as count FROM `articles` WHERE category_id = :category",array($categoryId[0]['id']));
//return var_dump($countArticles[0]['count']);

$count = $countArticles[0]['count'];

$pagesCount = ceil($count/$articlesOnPage);
//session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/mainpage.view.php";