<?php
require("header.php");
require("includes/upload.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <!-- <link rel="stylesheet" href="css/filters.css" /> -->
  <link rel="stylesheet" href="css/main.css" />
  
</head>
<body>
    <div class="top-container">
    <video id="video" autoplay>Something went wrong while streaming</video>
    <img src="" alt="" id="overlay" style="position:absolute;bottom:558px;width:200px;height:265px;">
    <button id="capture">
    Take Picture
    </button>
    <select id="filters">
    <option value="none">Default</option>
    <option value="grayscale(100%)">Grayscale</option>
    <option value="sepia(100%)">Sepia</option>
    <option value="blur(10px)">Blur</option>
    <option value="hue-rotate(90deg)">Hue</option>
    <option value="invert(100%)">Invert</option>
    <option value="contrast(200%)">contrast</option>
    </select>
    <select id="stickers">
    <option value="none">Default</option>
    <option value="./stickers/sticker1.png">Greentoon</option>
    <option value="./stickers/sticker2.png">Linkedin</option>
    <option value="./stickers/sticker3.png">Jordan</option>
    <option value="./stickers/sticker4.png">Google Store</option>
    <option value="./stickers/sticker5.png">Hippy</option>
    <option value="./stickers/sticker7.png">Linux</option>
    <option value="./stickers/sticker8.png">Linux Drunk</option>
    
    </select>
    </select>
    <button id="clear">Clear</button>
    <canvas id="canvas"></canvas>
    </div>
    <div class="bottom-container">
    <div id="thumbnail"></div>
    </div>
    <script src="capture.js"></script>
</body>
</html>