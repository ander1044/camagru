<?php 
require ("header.php");
if (isset($_SESSION['login']))
{
?>

<link rel="stylesheet" href="css/body.css"/>
<body>
<div class="bg">
<div class="container">
    <form method = "POST" action="./home.php" enctype="multipart/form-data">
    <textarea class="form-control" rows="5" id="comment" placeholder="What's on your mind?"></textarea><br>
    <label >Select Image
        <input type = "file" class="btn btn-primary" name="fileToUpload" id="fileToUpload" size="30">
    </label>   
    Select Sticker
    <select class="btn btn-primary" name="stickers" id="stickers">
        <option value="none">Default</option>
        <option value="./stickers/sticker1.png">Greentoon</option>
        <option value="./stickers/sticker2.png">Linkedin</option>
        <option value="./stickers/sticker3.png">Jordan</option>
        <option value="./stickers/sticker4.png">Google Store</option>
        <option value="./stickers/sticker5.png">Hippy</option>
        <option value="./stickers/sticker7.png">Linux</option>
        <option value="./stickers/sticker8.png">Linux Drunk</option>
    </select>
    <input type="submit" value="Upload Image" class="btn btn-primary" name="submit">
    </form>
   </div>
    <?php
}
    require('display.php');
?>
<?php


if(isset($_POST['submit']))
{
    $selected = $_POST["stickers"];
    $tmp = $_FILES["fileToUpload"]["tmp_name"];
    $check = getimagesize($tmp);
    if(empty($tmp))
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    else if (!strcmp($selected, "none"))
    {
        require 'includes/upload.php';
        upload($_FILES["fileToUpload"]["name"], $_FILES["fileToUpload"]["tmp_name"]);
    }
    else
    {
        $out=$_FILES["fileToUpload"]["name"];
        move_uploaded_file($tmp,"uploads/".$out);
        $stamp = imagecreatefrompng($selected);
        $im = imagecreatefromjpeg( "uploads/".$out);
        $marge_right = 10;
        $marge_bottom = 10;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);
        
        imagecopy($im, $stamp, 0, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

        imagejpeg($im,"uploads/".$out);
        imagedestroy($im);
        
        $images = "output".date('Y-m-dH-i-s').".jpeg";
        copy("uploads/".$out, "images/".$images);
  
        try
        {
            require 'includes/connect.php';
            $sql = $con->prepare("INSERT INTO images (userid, `description`, `image`, `target`, `time`) VALUES(?,?,?,?,now())");
            $arr = array($_SESSION['login'],"",$out, "images/".$images);
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
}

?>
</body>

