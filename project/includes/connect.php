<?php

$DB_DSN = "mysqldb";
$DB_USER = "root";
$DB_PASSWORD = "rootpasssaved";
$dbname = "camagru";
    try
    {
        $con = new PDO("mysql:host=$DB_DSN;dbname=$dbname", $DB_USER, $DB_PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e;
    }
?>