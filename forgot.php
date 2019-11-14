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
</div>
<input type="submit" class=" btn btn-block mybtn btn-warning tx-tfm"  name="forgot" value="Recover"required> 
<div class ="container sign">
<p class="text-center">Have an account? <a href="login.php">sign_in</a></p>
<p class="text-center"> Don't have an account? <a href="signup.php">sign_up</a></p>
</div>
</form>
</main> 
