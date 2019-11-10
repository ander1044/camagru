<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css" />
    <title>The Gram</title>
</head>
<body>
    <header>
        <div class="header">
            <nav>
                <a href="login.php" class="logo">THE_GRAM</a>
                <div class = "header_right">
                <?php
                session_start();
                    if(isset($_SESSION['login'])){
                     //   echo 'userid';
                        echo '
                        <a class="main" href="home.php">HOME</a>
                        <a class="#about" href="#">ABOUT</a>
                        <a class="#signout" href="includes/signout_inc.php">LOGOUT</a>';
                    }else
                    echo'
                    <a class="main" href="home.php">HOME</a>
                    <a class="#about" href="#">ABOUT</a>
                    <a class="#login" href="login.php">SIGNIN</a>
                    <a class="#signup" href="signup.php">SIGNUP</a>';
                ?>            
                    </div>
                </div>
            </nav>
        </div>
    </header>