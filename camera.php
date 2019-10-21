<!DOCTYPE html>
<html>
  <head>
    <title>
      Webcam
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="capture.js"></script>
    <link rel="stylesheet" href="filters.css" />
    <style>
      #vid-show, #vid-canvas, #vid-take {
        display: block;
        margin-bottom: 20px;
      }
      html, body {
        padding: 0;
        margin: 0;
      }
    </style>
  </head>
  <body>
    <div id="vid-controls">
      <video id="vid-show" autoplay></video>
      <input id="vid-take" type="button" value="Take Photo"/>
      <button id="filters-apply">Apply Filter</button>
      <div id="vid-canvas"></div>
    </div>
  </body>
</html>

