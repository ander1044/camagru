<?php
session_start();
include_once("connect.php");
    if (isset($_POST['email_change']))
    {
        
        $change = $_POST['email'];
        $userid = $_SESSION['login'];
        if (!filter_var($change, FILTER_VALIDATE_EMAIL))
        {
            echo '<script>alert("Invalid Email")</script>';
            exit();
        }
        else
        {
            try
            {
                $sql = $con->prepare("UPDATE users SET email = ? WHERE userid = ?");
                $arr = array($change, $userid);
                if ($sql->execute($arr) === TRUE)
                {
                    echo '<script>alert("Your email has been change!")</script>';
                    echo '<script>window.location = "changedetails.php"</script>';
         
                }
                else
                {
                    echo '<script>alert("Your email has been change. Check your inbox for verification")</script>';
                }
                $con = null;
            }
            catch(PDOException $e)
            {
                    echo "erro".$e;
            }
        }
    }
    if (isset($_POST['update']))
    {
        function validPass($password)
        {
            if(strlen($password) >= 8){
                if(!ctype_alpha($password) && !ctype_lower($password)){
                    return TRUE;
                }
            }
        }
        $userid = $_GET['id'];
        $password = $_POST['newpassword'];
        $conpass = $_POST['retypepassword'];
        
        
        if ($password !== $conpass)
        {
            exit();
        }
        elseif (validPass($password) !== TRUE)
        {
            exit();
        }
        else
        {
            if (empty($userid))
            {
                $userid = $_SESSION['email'];
            }
            echo $userid;
           
            try
            {
                $options = [ 'cost' =>12,];
                $hash = password_hash($password, PASSWORD_BCRYPT, $options);
                $sql = $con->prepare("UPDATE users SET password = ? WHERE email = ?");
                $arr = array($hash, $userid);
                if ($sql->execute($arr) === TRUE)
                {
                    echo '<script>alert("password updated!")</script>';
                }
                else
                {
                    echo '<script>alert("password Not updated, Try again!")</script>';
                }
                $con = null;
            }
            catch(PDOException $e)
            {
                echo "error".$e;
            }
        }
    }
?>