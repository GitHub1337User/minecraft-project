<?php


class Database{

    private $link;

    public function __construct(){
        $this->connect();
    }

    private function connect(){
        $config = require_once 'config-db.php';

//      $dsn = 'mysql:host=localhost;dbname=minecraft_db';

        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];

        $this->link= new PDO($dsn,$config['username'],$config['password'],$config['opt']);

        return $this;
    }

    public function execute($sql,$arrayForExecute){

        $sth = $this->link->prepare($sql);

        return $sth->execute($arrayForExecute);
    }

    public function query($sql,$arrayForExecute){
        $exe = $this->link->prepare($sql);

        $exe->execute($arrayForExecute);

        $result = $exe->fetchAll();

        if(!$result){
            return [];
        }
        else{
            return $result;
        }
    }
}
//$db = new Database();
//$db->execute("INSERT INTO 'admin' SET 'login'='admin3','password'='admin3'");

// Добавление в таблицу пример:

//$db->execute("INSERT INTO `admin` (`login`, `password`) VALUES ('admin2', 'admin2')");


// Выборка из таблицы пример:

//$admins = $db->query("SELECT * FROM `admin`");
//print_r($admins);