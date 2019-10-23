<?php
session_start();
    include_once("connect.php");
    if (isset($_POST['email_change']))
    {
        
        $change = $_POST['email'];
        $userid = $_SESSION['login'];
        if (!filter_var($change, FILTER_VALIDATE_EMAIL))
        {
            header("Location: ../changedetails.php?error=invalidmail");
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
                    echo '<script>window.location = "../changedetails.php"</script>';
                }
                else
                {
                    echo '<script>alert("Your email has been change. Check your inbox for verification")</script>';
                    echo '<script>window.location = "../changedetails.php"</script>';
                }
                $con = null;
            }
            catch(PDOException $e)
            {
                    echo "erro".$e;
            }
        }
    }
    if (isset($_POST['update_p']))
    {
        $userid = "lucky";
        $password = $_POST['newpassword'];
        $conpass = $_POST['retypepassword'];
    
        
        if ($password !== $conpass)
        {
            header("Location: ../changedetails.php?error=passwordnotmatching");
            exit();
        }
        elseif (validPass($password) !== TRUE)
        {
            header("Location: ../changedetails.php?error=invalidpassword");
            exit();
        }
        else
        {
            try
            {
                $options = [ 'cost' =>12,];
                $hash = password_hash($password, PASSWORD_BCRYPT, $options);
                $sql = $con->prepare("UPDATE users SET password = ? WHERE userid = ?");
                $arr = array($hash, $userid);
                if ($sql->execute($arr) === TRUE)
                {
                    echo '<script>alert("password updated!")</script>';
                    echo '<script>window.location="../changedetails.php"</script>';
                }
                else
                {
                    echo '<script>alert("password Not updated, Try again!")</script>';
                    echo '<script>window.location="../changedetails.php"</script>';
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