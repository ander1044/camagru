<?php   
    function upload($name, $tmp)
    {
    require "connect.php";

     $target = "images/";

        $image = "output".date('Y-m-dH-i-s').".jpeg";
        move_uploaded_file($tmp, $target.$image);
        
    
        try
        {
            $sql = $con->prepare("INSERT INTO images (userid, `description`, `image`, `target`, `time`) VALUES(?,?,?,?,now())");
            $arr = array($_SESSION['login'],"",$name, "images/".$image);
            if ($sql->execute($arr) === TRUE)
            {
                echo '<script>alert("Image added succesfully")</script>';
                echo '<script>window.location = "home.php"</script>';
            }
        }
        catch(PDOException $e)
        {
            echo $e;
        }
    }
?>