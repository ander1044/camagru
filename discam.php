<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
      
<select id="filters">
    <option value="none">Default</option>
    <option value="grayscale(100%)">Grayscale</option>
    <option value="sepia(100%)">Sepia</option>
    <option value="blur(10px)">Blur</option>
    <option value="hue-rotate(90deg)">Hue</option>
    <option value="invert(100%)">Invert</option>
    <option value="contrast(200%)">contrast</option>
    </select>

    <form method = "POST" >
    <select name="stickers" id="stickers">
    <option value="none">Default</option>
    <option value="./stickers/sticker1.png">Greentoon</option>
    <option value="./stickers/sticker2.png">Linkedin</option>
    <option value="./stickers/sticker3.png">Jordan</option>
    <option value="./stickers/sticker4.png">Google Store</option>
    <option value="./stickers/sticker5.png">Hippy</option>
    <option value="./stickers/sticker7.png">Linux</option>
    <option value="./stickers/sticker8.png">Linux Drunk</option>
    
   <input type = "hidden" id = "url" name = "url"> </p>
   <input type ="submit" name = "apply" value  = "Apply">
    </select>
    </form>
    <button id="clear">Clear</button>
    <canvas id="canvas"></canvas>
    </div>
    <div class="bottom-container">
    <div id="thumbnail"></div>
    </div>
  
  
  
<?php
if (isset($_POST['apply']))
{
  $selected = $_POST["stickers"];
  $target = $_POST["url"];

  
  
  $image = "output".date('Y-m-dH-i-s').".jpeg";
  imagejpeg(imagecreatefromstring(file_get_contents($target)), "uploads/".$image);

  
  $im = imagecreatefromjpeg("uploads/".$image);
  $stamp = imagecreatefrompng($selected);
  
  //die();
  
  
  $marge_right = 10;
  $marge_bottom = 10;
  $sx = imagesx($stamp);
  $sy = imagesy($stamp);
  
  //echo $im;
  //die();
  
  imagecopy($im, $stamp, 0, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
  
  //$date = new DateTime();
  //rename($target, "image" . $date->format('Y-m-d H:i:sP') . ".jpg");
  
  
  $out="uploads/".$image;

  
  imagejpeg($im,$out);
  imagedestroy($im);
  
 // die();
  echo "<img src=$out >";

}
?>
</body>
</html>