<?php

$con = mysqli_connect("localhost", $name, $password);

$sql = $con->prepare("CREATE DATABASE camagru");
$sql->execute();
$con = mysqli_connect("localhost", $name, $password, "camagru");

$usertable = $con->prepare("CREATE TABLE users(
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
