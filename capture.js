window.addEventListener("load", function(){
    // [1] GET ALL THE HTML ELEMENTS
    var defualt_filter = 0;
    var filters = [
        'greyscale',
        'sepia',
        'blur',
        'brightness',
        'contrast',
        'hue-rotate',
        'hue-rotate2',
        'hue-rotate3',
        'saturate',
        'invert',
        'none'
    ];
    var video = document.getElementById("vid-show"),
        canvas = document.getElementById("vid-canvas"),
        take = document.getElementById("vid-take");
        apply = document.getElementById("filters-apply");

  
    // [2] ASK FOR USER PERMISSION TO ACCESS CAMERA
    // WILL FAIL IF NO CAMERA IS ATTACHED TO COMPUTER
    navigator.mediaDevices.getUserMedia({ video : true })
    .then(function(stream) {
      // [3] SHOW VIDEO STREAM ON VIDEO TAG
      video.srcObject = stream;
      video.play();
  
      // [4] WHEN WE CLICK ON "TAKE PHOTO" BUTTON
      take.addEventListener("click", function(){
        // Create snapshot from video
        var draw = document.createElement("canvas");
        draw.width = video.videoWidth;
        draw.height = video.videoHeight;
        var context2D = draw.getContext("2d");
        context2D.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
        // Put into canvas container
        canvas.innerHTML = "";
        canvas.appendChild(draw);
      });
    })
    .catch(function(err) {
      document.getElementById("vid-controls").innerHTML = "Please enable access and attach a camera";
    });
    //Iterate through filters
    var effect = filters[defualt_filter++ % filters.length];
    if (effect)
    {
        video.classList.add(effect);
        canvas.classList.add(effect);
        this.document.querySelector('.container h3').innerHTML = 'Current filter is: ' +effect;
    }
  });