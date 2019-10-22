(function(){

  var defualt_filter = 0;
  var filters = ['greyscale', 'sepia', 'blur',
       'brightness', 'contrast', 'hue-rotate', 'hue-rotate2',
       'hue-rotate3', 'saturate', 'invert', 'none'];

  var canvas = document.getElementById('canvas'),
  context = canvas.getContext('2d'),
  video = document.getElementById('video');
  //filter = document.getElementById('filters'),
  //vendorUrl = window.URL || window.webkitURL;

  navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

  navigator.getMedia({
    video: true,
    audio: false
  },
  function(stream){
    video.srcObject = stream;
   // video.src = vendorUrl.createObjectURL(stream);
    video.play();
  },
  function(error){
    //An error Occured
    //error.code
  });
  document.getElementById('capture').addEventListener('click', function(){
    context.drawImage(video, 0, 0, 400, 300);
  });
  
})();