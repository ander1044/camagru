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
<form method  = "post">
<h1>Register</h1>
<p>Create your account</p>
<hr>
<input type="text" name="email" placeholder="email" required><br>
<input type="text" name="name" placeholder="Full Name" required><br>
<input type="text" name="username" placeholder="Username" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<input type="password" name="repassword" placeholder="Retype Password" required><br>
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="other">Other<br>
<input type="submit" name="signup" value="Sign_up">
<div class ="container sign">
Have an account? <a href="login.php">sign_in</a>
</div>
</form>

</main>
</body>
</html>