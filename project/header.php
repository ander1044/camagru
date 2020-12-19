<?php
    if(!isset($_SESSION)){
      session_start();
    }
    if(isset($_SESSION['login'])){
      session_start();
      $user = $_SESSION['login'];
      require ('bootstrap.php');
      echo '
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="#">THE_GRAM</a>
              </div>
              <ul class="nav navbar-nav">
                <li class="active"><a href="home.php">HOME</a></li>
                <li class="active"><a href="camera.php">Camera</a></li>
                <li class="active"><a href="changedetails.php">Update Information</a></li>
                <li class="active"><a href="includes/signout_inc.php">LOGOUT</a></li>
              </ul>
            </div>    
          </nav>';
    }else {
      require ('bootstrap.php');
      echo'
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="#">THE_GRAM</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="home.php">HOME</a></li>
              <li class="active"><a href="#">ABOUT</a></li>
              <li class="active"><a href="login.php">SIGNIN</a></li>
              <li class="active"><a href="signup.php">SIGNUP</a></li>
            </ul>
          </div>    
        </nav>';
    }
  ?> 
<footer>
   <?php
require ("footer.php");
?>
</footer>
 