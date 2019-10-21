<!DOCTYPE html>
<html>
  <head>
    <title>
      Webcam
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="capture.js"></script>
    <link rel="stylesheet" href="filters.css" />
  </head>
  <body>
    <div id="vid-controls">
      <video id="vid-show" autoplay></video>
      <input type="file" accept="image*/";capture=camera/>
      <input id="vid-take" type="button" value="Take Photo"/>
      <button id="filter-apply">Apply Filter</button>
      <div id="vid-canvas"></div>
    </div>
  </body>
</html>

