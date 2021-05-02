<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/db/Database.php';
$db = new Database();
$crafts = $db->query("SELECT * FROM `crafts`",array());

include_once $_SERVER['DOCUMENT_ROOT']."/crafts.view.php";