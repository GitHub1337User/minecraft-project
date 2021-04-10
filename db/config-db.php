<?php
//$dsn = 'mysql:host=localhost;dbname=minecraft_db';
//$pdo = new PDO($dsn, 'root', 'root');
//if(!$pdo){
//    die("ERROR");
//}
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
return [
        "host"=>"localhost",
        "db_name"=>"minecraft_db",
        "username"=>"root",
        "password"=>"root",
        "charset"=>"utf8",
        "opt"=>$opt

];
