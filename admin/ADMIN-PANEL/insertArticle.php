<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
$category = $_POST['category '];
$password = md5($_POST['password']);