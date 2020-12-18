<?php
require("header.php");
require("includes/signup_inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
    <div class="container">      
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
    <div class="row">                
    </div>   
    <div class="panel panel-default" >
    <div class="panel-heading">
    <div class="panel-title text-center">Register</div>
    </div> 
    <div class="panel-body" >
<form name="form" method  = "post">
<p>Create your account</p>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input type="text" class="form-control" name="email" placeholder="email" autocomplete="on" required><br>
</div>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" name="name" placeholder="Full Name" autocomplete="on"required><br>
</div>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-console"></i></span>
<input type="text" class="form-control" name="username" placeholder="Username" autocomplete="on" required><br>
</div>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="on" required><br>
</div>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" name="repassword" placeholder="Retype Password" autocomplete="off" required><br>
</div>
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="other">Other<br>
<div class="col-md-12 text-center mb-3">
<input class=" btn btn-block mybtn btn-primary tx-tfm" type="submit" name="signup" value="Sign_up">
</div>
<div class="col-md-12 ">
<div class="form-group">
<p class="text-center">Have an account? <a href="login.php">sign_in</a></p>
</div>
</div>
</div>
</div>
</form>
</div>
</main>
</body>
</html>