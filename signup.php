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

<p>Create your account</p>
<form action="includes/signup_inc.php" method="POST">
<input type="text" name="email" placeholder="email"><br>
<input type="text" name="name" placeholder="Full Name"><br>
<input type="text" name="username" placeholder="Username"><br>
<input type="password" name="password" placeholder="Password"><br>
<input type="password" name="repassword" placeholder="Retype Password"><br>
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="other">Other<br>
<input type="submit" name="signup" value="Sign_up">
</form>
Have an account? <a href="login.php">sign_in</a>
</main>
</body>
</html>