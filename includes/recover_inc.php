<?php
if (isset($_POST['forgot']))
{
    $email = $_POST['email'];

    if (empty($email))
    {
        header("Location: ../forgot.php?error=emptyfield");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../forgot.php?error=invalidemail");
        exit ();
    }    
}
echo "Email: ".$email;

?>