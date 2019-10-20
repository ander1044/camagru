<?php
if (isset($_POST['forgot']))
{
    $checker = bin2hex(random_bytes(10));
    $token = random_bytes(32);
    $link = "localhost/passwordrecovery.php?checker=" .$checker. "&validator=" .bin2hex($token);
    $expiry = date("U") + 900;
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
echo "Email: ".$email. "<br>";
echo "Link :" .$link;

?>