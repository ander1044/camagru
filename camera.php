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
        <video id="video" width="400" height="300" autoplay></video>
        <!-- <a href="captured.php" class="button" id="capture">Take Photo</a> -->
        <input id="capture" type="button" value="Take Photo"/>
        
        <!-- <input type="file" accept="image*/";capture=camera/> -->
        <figure>
          <canvas id="canvas" width="400" height="300">
          </canvas>
          <!-- <img id="st1" type="hidden" src="https://i.ebayimg.com/images/g/SWMAAOSwoAVbX15m/s-l300.jpg" alt=""> -->
          <p id="smiley">&#x1F600;</p> 
          &#x1F923; &#x1F60A; &#x1F970; &#x1F60B;  
        <a href="#" id="btn-download" download="webcam.png" onclick"capture">Download</a>
        <!-- <input id="retake" type="button" value="retake"/> -->
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