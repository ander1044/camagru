<?php
require("header.php");
require("includes/upload.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/filters.css" />
  <link rel="stylesheet" href="css/main.css" />
  
</head>
<body>
    <section>
    <div class="booth">
      <form method = "POST" enctype="multipart/form-data">
      <div class="sticker-wrapper">
        <video id="video" autoplay></video>
      </div>
        <input id="capture" type="button" value="Take Photo"/>
        
        <figure>
          <canvas id="canvas" width="400" height="300"> 
          </canvas>
          <img class="stk3" src=""/>
        <a href="#" id="btn-download" download="webcam.png" onclick"capture">Download</a>
        <input id="stickers" type="button" value="Add Stickers"/>
        <figcaption>
          <input id="caption" type=text name="caption" placeholder="Say something about this photo..."/>
        </figcaption>
        <input id="upload" type="submit" name="fileToUpload" value="Post"/>
        </figure>
</form>
        
      </div>
      <script src="capture.js"></script>
</section>
</body>
</html>