<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="css/styling.css" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>The Gram</title>
    <style>
         body{background-color: #f1f1f1;}
    </style>
</head>
<body>
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
                <?php
                session_start();
                    if(isset($_SESSION['login']))
                    {
                        echo '
                        <li class="active"><a href="home.php">HOME</a></li>
                        <li class="active"><a href="camera.php">Camera</a></li>
                        <li class="active"><a href="changedetails.php">Update Information</a></li>
                        <li class="active"><a href="includes/signout_inc.php">LOGOUT</a></li>';
                    }else
                    echo'
                    <li class="active"><a href="home.php">HOME</a></li>
                    <li class="active"><a href="#">ABOUT</a></li>
                    <li class="active"><a href="login.php">SIGNIN</a></li>
                    <li class="active"><a href="signup.php">SIGNUP</a></li>';
                ?>            
                    </div>
                </div>
            </nav>
        </div>
                </body>
