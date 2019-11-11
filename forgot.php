<?php
require("header.php");
require("includes/recover_inc.php");
?>
<main>
<div class="container">
<form  method="POST">
<h2>Recover Password</h2>
<div class="form-group">
<input type="text" class="form-control" name="email" placeholder="email"required><br>
<input type="submit" class="btn btn-warning" name="forgot" value="Recover"required> 
<div class ="container sign">
Have an account? <a href="login.php">sign_in</a><br>
Don't have an account? <a href="signup.php">sign_up</a>
</div>
</form>
</main> 
