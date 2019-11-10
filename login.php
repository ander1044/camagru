<?php
require("header.php");
require("includes/login_inc.php");
?>
<main>
<div class="container">
<form action="#" method="POST">
<p>Have an account?</p>
<hr>
<input type="text" name="username" placeholder="username/email" autocomplete="on" required><br>
<input type="password" name="password" placeholder="password" autocomplete="off" required><br>
<input type="submit" name="login" value="Sign_in">
<div class ="container sign">
<a href="forgot.php">Forgot Password?</a><br>
Don't have an account? <a href="signup.php">sign_up</a>
</div>
</form>
</main> 
