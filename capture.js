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
   // video.stop();
    //video.onpause();
  },
  function(error){
    //An error Occured
    //error.code
  });
  document.getElementById('capture').addEventListener('click', function(){
    context.drawImage(video, 0, 0, 400, 300);
    return new Promise((res, rej)=>{
      canvas.toBlob(res, 'image/jpeg'); // request a Blob from the canvas
    });
   
  });
  function download(blob){
    // uses the <a download> to download a Blob
    let a = document.createElement('a'); 
    a.href = URL.createObjectURL(blob);
    a.download = 'screenshot.jpg';
    document.body.appendChild(a);
    a.click();
  }

//   var button = document.getElementById('btn-download');
// button.addEventListener('click', function() {
//     var dataURL = canvas.toDataURL('image/png');
//     button.href = dataURL;
// });

  document.getElementById('btn-download').style.display = 'none';
  // document.getElementById('retake').style.display = 'none';
  document.getElementById('stickers').style.display = 'none';
  document.getElementById('upload').style.display = 'none';
  document.getElementById('caption').style.display = 'none';

document.getElementById('capture').onclick = function(){ 
  // alert('image captured');
  document.getElementById('btn-download').style.display = 'block';
  // document.getElementById('retake').style.display = 'block';
  document.getElementById('stickers').style.display = 'block';
  document.getElementById('upload').style.display = 'block';
  document.getElementById('caption').style.display = 'block';
  document.getElementById('video').style.display = 'none';
  document.getElementById('video').style.display = 'none';
  document.getElementById('capture').style.display = 'none';
  
}
// document.getElementsByClassName('stk3').style.display = 'none';
// document.getElementById('stickers').onclick = function(){
//   var c = document.getElementById("canvas");
//   var ctx = c.getContext("2d");
//   var img = document.getElementById("st1");
//   ctx.drawImage(img, 0, 0);

// }

})();