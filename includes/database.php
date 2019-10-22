<?php

$DB_DSN = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "";
$dbname = "camagru";
try{
    $con = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $con->prepare("CREATE DATABASE camagru");
    $sql->execute();
    $con = null;
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

try{

    $conn = new PDO("mysql:host=$DB_DSN;dbname=$dbname", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $usertable = $conn->prepare("CREATE TABLE users(
        id INT(6) NOT NULL UNIQUE AUTO_INCREMENT,
        firstname VARCHAR(100),
        lastname VARCHAR(100),
        userid VARCHAR(100) PRIMARY KEY NOT NULL,
        password VARCHAR(100) NOT NULL,
        gender VARCHAR(10),
        email VARCHAR(100) UNIQUE,
        verified INT(2)
        )
    ");
    $usertable->execute();
    $conn = null;
}
catch(PDOException $e)
{
    echo $usertable."<br>" . $e->getMessage();
}