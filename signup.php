<main>
<form action="includes/signup_inc.php" method="POST">
<p>Create your account</p>
<input type="text" name="email" placeholder="email" required><br>
<input type="text" name="name" placeholder="Full Name" required><br>
<input type="text" name="username" placeholder="Username"required><br>
<input type="password" name="password" placeholder="Password"required><br>
<input type="password" name="repassword" placeholder="Retype Password"required><br>
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="other">Other<br>
<input type="submit" name="signup" value="Sign_up">
</form>
Have an account? <a href="login.php">sign_in</a>
</main>