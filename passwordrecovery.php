<main>
<?php
$email = $_GET['id'];
require("includes/change.php");
?>
<div class="container">
<form  method="POST">
<h2>Create new password</h2>
<div class="form-group">
<input type="password" class="form-control" name="newpassword" placeholder="New Password"required><br>
<input type="password" name="retypepassword" class="form-control" placeholder="Retype password"required><br>
<input class="btn btn-primary" type="submit" name="update" value="update"> 
</form>
</div>
</main> 