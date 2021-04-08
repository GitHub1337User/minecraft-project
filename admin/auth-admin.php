<?php
require $_SERVER['DOCUMENT_ROOT'].'/db/config-db.php';
$login= $_POST['login'];
$password = $_POST['login'];



$sql = 'INSERT INTO tasks(task) VALUES(:task)';
$query = $pdo->prepare($sql);
$query->execute(['task' => $task]);

header('Location: /');
?>