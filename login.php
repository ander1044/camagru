<?php
require("header.php");
require("includes/login_inc.php");
?>
<main>
<div class="container">
<form action="#" method="POST">
<h2>Have an account?</h2>
<div class="form-group">
<input type="text" class="form-control" name="username" placeholder="username/email" autocomplete="on" required><br>
<input type="password" class="form-control" name="password" placeholder="password" autocomplete="off" required><br>
<input class="btn btn-primary" type="submit" name="login" value="Sign_in">
<div class ="container sign">
<a href="forgot.php">Forgot Password?</a><br>
Don't have an account? <a href="signup.php">sign_up</a>
</div>
</form>
</main> 
