<?php
require("header.php");
require("includes/login_inc.php");
?>
<main>
<div class="container">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="row">                
        </div>
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Have an account?</div>
            </div> 
            <div class="panel-body" >
<form name="form" id="form" class="form-horizontal" action="#" method="POST">
<div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" name="username" placeholder="username/email" autocomplete="on" required><br>
</div>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" name="password" placeholder="password" autocomplete="off" required><br>
</div>
<div class="form-group">
<p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
</div>
<div class="col-md-12 text-center ">
<input class=" btn btn-block mybtn btn-primary tx-tfm" type="submit" name="login" value="Sign_in">
</div>
<div class="col-md-12 ">
<div class="form-group">
<p class="text-center"><a href="forgot.php">Forgot Password?</a><br>
<p class="text-center">Don't have an account? <a href="signup.php">sign_up</a>
</div>
</form> 
</div>
</div>
</main> 
