<?php
if (isset($_POST['forgot']))
{
    $checker = bin2hex(random_bytes(10));
    $token = random_bytes(32);
//    $link = "http://localhost:8080/camagru/passwordrecovery.php?checker=" .$checker. "&validator=" .bin2hex($token)."&id=".$_POST['email'];
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

        $message = '<a href ="http://localhost:8080/camagru/passwordrecovery.php?checker='.$checker.'"&v="'.bin2hex($token).'"&id="'.$_POST['email'].'">Click here to change your password</a>';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($email, "email Recovery", $message, $headers);
        echo '<script>alert("check your inbox. Follow the link sent to your email to change your password")</script>';
        echo '<script>window.location = "login.php"<script>';
    }
}
?>