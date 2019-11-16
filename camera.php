<?php
if(!isset($_SESSION))
{
  session_start();
}
if (!isset($_SESSION['login']))
{
    echo '<script>window.location="login.php"</script>';
}
require("header.php");
require("includes/upload.php");
?>

  <style>
    img {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 15px;
      width: 160px;
      float: right;
      margin-right: 0%;
}
}
    img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
  </style>
  <div class="container">
    <div class="col-md-6">
      <form method = "post" action = "camera.php">
      
        <video id="video" autoplay >Something went wrong while streaming</video>

        <button id="capture" class="btn btn-primary" name = "sub">
        Take Picture
        </button>

        <input type = "hidden" id = "url" name = "url">
      </form>
      <button id="clear" class="btn btn-warning">Clear</button>
    
      <canvas id="canvas"></canvas>
      <div id="thumbnail"></div>
    </div>
    <div class="col-md-6">
      <?php
      require('includes/connect.php');
      $sql = $con->prepare("SELECT * FROM images WHERE userid=? ORDER BY time DESC");
      if($sql->execute([$_SESSION['login']]))
      {
        $dir = $sql->fetchAll();
  
      // $dir = glob('uploads/{*.jpeg, *jpg}', GLOB_BRACE);
       foreach ($dir as $value){
          ?>
            <img src="<?php echo $value;?>" alt="<?php?>">
      <?php
      }
    }
      ?>
    </div>
  </div>
    

    <?php
    if (isset($_POST["sub"]))
    {

      $_SESSION['url'] = $_POST["url"];

     $_SESSION['done'] = "0";
      echo '<script>window.location= "discam.php"</script>';
    }
    ?>
    <script src="capture.js"></script>
<?php
require ("footer.php");
?>