<?php 
//require ("includes/upload.php");
require ("header.php");
?>
<body>
    <form method = "POST" action="./home.php" enctype="multipart/form-data">
    <textarea name="content" id="" rows="4" placeholder="What's on your mind,<?php echo $username."?" ?>"></textarea><br>
    <label >Select Image
        <input type = "file" name="fileToUpload" id="fileToUpload" size="30">
    </label>   
    Select Sticker
    <select name="stickers" id="stickers">
        <option value="none">Default</option>
        <option value="./stickers/sticker1.png">Greentoon</option>
        <option value="./stickers/sticker2.png">Linkedin</option>
        <option value="./stickers/sticker3.png">Jordan</option>
        <option value="./stickers/sticker4.png">Google Store</option>
        <option value="./stickers/sticker5.png">Hippy</option>
        <option value="./stickers/sticker7.png">Linux</option>
        <option value="./stickers/sticker8.png">Linux Drunk</option>
    </select>
    <input type="submit" value="Upload Image" name="submit">
    </form>
<?php
if(!isset($_FILES["fileToUpload"]))
{
    echo "Error";
	exit;
}
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG file is allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "<br>Sorry, your file was not uploaded.";
	exit;
    
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "<br>Sorry, there was an error uploading your file.";
        exit;
    }
}
?>
<?php
if(isset($_POST['submit'])) 
{
    $selected = $_POST["stickers"];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
//var_dump ($selected);
$stamp = imagecreatefrompng($selected);
$im = imagecreatefromjpeg($target_file);
if(imagesx($im)<500 || imagesy($im) <500)
{
	echo "image size too low";
	exit;
}
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

imagecopy($im, $stamp, 0, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

$out="uploads/".$_FILES["fileToUpload"]["name"];
imagejpeg($im,$out);
imagedestroy($im);
echo "<img src=$out >";

?>

</body>