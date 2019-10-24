<?php 
require ("includes/upload.php");
?>
<body>
    <form method = "POST" enctype="multipart/form-data"> 
    <input type = "file" name="fileToUpload" id="fileToUpload">
    <input type = "submit" name = "image" value = "Upload Image">   
    </form>
</body>