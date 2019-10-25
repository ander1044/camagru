<?php
require("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/filters.css" />
  
</head>
<body>
    <section>
    <div class="booth">
        <video id="video" width="400" height="300" controls></video>
        <input id="capture" type="button" value="Take Photo"/>
        <input id="filters" type="button" value="Add Filter"/>
        <input type="file" accept="image*/";capture=camera/>
        <canvas id="canvas" width="400" height="300"></canvas>
        <a href="#" class="button" id="btn-download" download="webcam.png" onclick"capture">Download</a>
      </div>
      <script src="capture.js"></script>
      <!-- <script>
      function hide(){
        var x = document.getElentById("canvas");
        if (x.style.display === "none"){
          x.style.display = "block";
        } else {
          x.style.dislay = "none";
        }
      }
      </script> -->
</section>
</body>
</html>