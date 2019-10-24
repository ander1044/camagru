<?php
if (isset($_POST['forgot']))
{
    $checker = bin2hex(random_bytes(10));
    $token = random_bytes(32);
    $link = "localhost:8080/camagru/passwordrecovery.php?checker=" .$checker. "&validator=" .bin2hex($token)."&id=".$_POST['email'];
    $expiry = date("U") + 900;
    $email = $_POST['email'];

    if (empty($email))
    {
        echo '<script>alert("Invalid Email")</script>';
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo '<script>alert("Invalid Email")</script>';
        exit ();
    }
    else
    {
        $message = "copy the link and past it in your browser: ".$link;
        mail($email, "email Recovery", $message);
        echo '<script>alert("check your inbox. Follow the link sent to your email to change your password")</script>';
        echo '<script>window.location = "login.php"<script>';
    }
}
?>