let width = 500,
    height = 0,
    filter = 'none',
    sticker = 'none',
    streaming = false;

  const video = document.getElementById('video');
  const canvas = document.getElementById('canvas');
  const capture = document.getElementById('capture');
  const thumbnail = document.getElementById('thumbnail');
  const addfilter = document.getElementById('filters');
  const clear = document.getElementById('clear');
  //const sticker = document.getElementById('stickers'); 

  navigator.mediaDevices.getUserMedia({video: true, audio: false})
  
  .then(function(stream)
  {
   video.srcObject = stream;
   video.play();
  })
  .catch(function(err)
  {
    console.log('Error: ${err}');
  });

  video.addEventListener('canplay', function(e)
  {
    if(!streaming)
    {
      height = video.videoHeight / (video.videoWidth / width);

      video.setAttribute('width', width);
      video.setAttribute('height', height);
      canvas.setAttribute('width', width);
      canvas.setAttribute('height', height);

      streaming = true;
    }
  }, false)
  
  capture.addEventListener('click', function(e)
  {
    captureImage();
    e.preventDefault();
  }, false);

  addfilter.addEventListener('change', function(e)
  {
   filter = e.target.value;
   video.style.filter = filter;
   e.preventDefault(); 
  });

  clear.addEventListener('click', function(e)
  {
    thumbnail.innerHTML = '';
    filter = 'none';
    video.style.filter = filter;
    addfilter.selectedIndex = 0;
  }
  )

  function captureImage()
  {
    const context = canvas.getContext('2d');
    if (width && height)
    {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);

      const imgUrl = canvas.toDataURL('image/png');
      //console.log(imgUrl);
      const image = document.createElement('img');
      image.setAttribute('src', imgUrl);
      image.style.filter = filter;
      thumbnail.appendChild(image);
      
    }
  }