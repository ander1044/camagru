<?php

$name = "root";
$password = "";

$con = mysqli_connect("localhost", $name, $password, "camagru");
if ($con->connect_error)
{
    die("Connection Failed");
}
