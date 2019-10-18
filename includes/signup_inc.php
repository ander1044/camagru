<?php
function validPass($password)
{
    if(strlen($password) >= 8){
        if(!ctype_alpha($password) && !ctype_lower($password)){
            return TRUE;
        }
    }
}
if (isset($_POST['signup']))
{
    $email = $_POST['email'];
    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if (empty($email) || empty($fullname) 
    || empty($username) || empty($password) || empty($repassword))
    {
        header("Location: ../signup.php?error=emptyfields");
        exit();
    }
    elseif ($password !== $repassword)
    {
        header("Location: ../signup.php?error=passwordnotmatching");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../signup.php?error=invalidmail");
        exit();
    }
    elseif (validPass($password) !== TRUE)
    {
        header("Location: ../signup.php?error=invalidpassword");
        exit();
    }

echo "mail:" .$email. "<br>";
echo "name:" .$fullname. "<br>";
echo "user:" .$username. "<br>";
echo "password:" .$password. "<br>";
echo "repassword:" .$repassword;
}
?>