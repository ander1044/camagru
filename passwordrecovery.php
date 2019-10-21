<main>
<?php
$email = $_GET['id'];
?> 
<form action="includes/signup_inc.php?id=<?php echo $email?>" method="POST">
<p>Create new password</p>
<input type="password" name="newpassword" placeholder="New Password"required><br>
<input type="password" name="retypepassword" placeholder="Retype password"required><br>
<input type="submit" name="update" value="update"> 
</form>
</main> 