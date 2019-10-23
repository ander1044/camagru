<?php
session_start();
include_once("connect.php");
if (isset($_FILES['fileToUpload']))
{
    $name = $_FILES['fileToUpload']['name'];
    $type = $_FILES['fileToUpload']['tmp_name'];
    $tmpn =  getimagesize($_FILES['fileToUpload']['tmp_name']);
    $target = "../images/";
    if (isset($tmpn))
    {
        move_uploaded_file($type, $target.$name);
        try
        {
            $sql = $con->prepare("INSERT INTO images (userid, description, image, time) VALUES(?,?,?,now())");
            $arr = array($_SESSION['login'],"", $name);
            if ($sql->execute($arr) === TRUE)
            {
                echo '<script>alert("Image added succesfully")</script>';
            }
        }
        catch(PDOException $e)
        {
            echo $e;
        }
    }
    else
    {
        $type;
    }
}
?>