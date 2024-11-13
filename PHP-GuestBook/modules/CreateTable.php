<?php
require_once './dbConnection.php';

ConnectDB::$pass = '';
ConnectDB::$userNme = 'root';
$dbhendle = ConnectDB::GetConnect();

try {
    $dbhendle->exec(
        "CREATE TABLE Guest (
          Id INT PRIMARY KEY AUTO_INCREMENT,
          Name VARCHAR(25) NOT NULL,
          Msg VARCHAR(255) NOT NULL,
          City VARCHAR(50),
          Email VARCHAR(25),
          Answer VARCHAR(255),
          PutTime DATETIME DEFAULT CURRENT_TIMESTAMP,
          IsVisible ENUM('hide','show') DEFAULT('show')
          
          )"

    );
} catch (PDOException $e) {

    echo ($e);
};
    




// $dbhendle->exec("INSERT INTO Guest (Name,City,Msg) VALUES ('Processor','City','message')");
