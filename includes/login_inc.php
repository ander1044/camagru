<?php
if (isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password))
    {
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    elseif (filter_var($username, FILTER_VALIDATE_EMAIL))
    {
        header ("Location: ../login.php?error=invalidusermail");
        exit();
    }

}
echo "User: ".$username."<br>";
echo "Password: ".$password;
?>