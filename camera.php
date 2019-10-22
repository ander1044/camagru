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
        <video id="video" width="400" height="300" autoplay></video>
        <input id="capture" type="button" value="Take Photo"/>
        <input id="filters" type="button" value="Add Filter"/>
        <input type="file" accept="image*/";capture=camera/>
        <canvas id="canvas" width="400" height="300"></canvas>
      </div>
      <script src="capture.js"></script>
</section>
</body>
</html>