<?php 
//require ("includes/upload.php");
require ("header.php");
?>
<body>
    <form action="home.php?" method = "POST" enctype="multipart/form-data">
    <textarea name="content" id="" rows="4" placeholder="What's on your mind,<?php echo $username."?" ?>"></textarea><br>
     <label >Select Image
    <input type = "file" name="fileToUpload" id="fileToUpload" size="30">
</label>   
<button name="post">Post</button>
    </form>
</body>