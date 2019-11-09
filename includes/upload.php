<?php
 session_start();
// if (isset($_FILES['fileToUpload']))
// {
    // $name = $_FILES['fileToUpload']['name'];
    // $type = $_FILES['fileToUpload']['tmp_name'];
    // $tmpn =  getimagesize($_FILES['fileToUpload']['tmp_name']);
    
    function upload($name)
    {
    include_once("connect.php");

    //echo "asdasd";
    //die();
     $target = "images/";

    // if (!preg_match("/\.(gif|jpg|png)$/i", $name)){
    //     echo '<script>alert("invalid file type")</scipt>';
    // }
    // else if (!empty($tmpn))
    // {
        move_uploaded_file($name, $target.$name);
        try
        {
            $sql = $con->prepare("INSERT INTO images (userid, `description`, `image`, `target`, `time`) VALUES(?,?,?,?,now())");
            $arr = array($_SESSION['login'],"",$name, "images/".$name);
            if ($sql->execute($arr) === TRUE)
            {
                echo '<script>alert("Image added succesfully")</script>';
                echo '<script>window.location = "index.php"</script>';
            }
        }
        catch(PDOException $e)
        {
            echo $e;
        }
    }
//     }
//     else
//     {
//         echo '<script>alert("invalid image Selected")</script>';
//     }
// }
?>