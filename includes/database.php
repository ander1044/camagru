<?php

$DB_DSN = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "197419ander";
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
    echo $sql . "<br>" . $e;
}

try{
    $conn = new PDO("mysql:host=$DB_DSN;dbname=$dbname", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $usertable = $conn->prepare("CREATE TABLE users(
        id INT(6) NOT NULL UNIQUE AUTO_INCREMENT,
        firstname VARCHAR(100),
        lastname VARCHAR(100),
        userid VARCHAR(100) PRIMARY KEY NOT NULL,
        `password` VARCHAR(100) NOT NULL,
        gender VARCHAR(10),
        email VARCHAR(100) UNIQUE,
        token VARCHAR(100) NOT NULL,
        verified INT(2)
        )
    ");
    $imagetable = $conn->prepare("CREATE TABLE images(
        imageid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        userid VARCHAR(100) NOT NULL,
        `description` VARCHAR(200),
        `image` VARCHAR(100) NOT NULL,
        `target` VARCHAR(100) NOT NULL,
        `time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP )ENGINE = InnoDB"
    );
    $likes = $conn->prepare("CREATE TABLE `likes` 
    ( `id` INT NOT NULL AUTO_INCREMENT ,
    `username` VARCHAR(100) NOT NULL ,
    `imageid` VARCHAR(100) NOT NULL ,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;
    ");
    $usertable->execute();
    $imagetable->execute();
    $likes->execute();
    $conn = null;
}
catch(PDOException $e)
{
    echo $usertable."<br>" . $e;
}