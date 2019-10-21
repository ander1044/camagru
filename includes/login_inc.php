<?php
include_once("connect.php");
if (isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password))
    {
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    
        $sql = $con->prepare("SELECT * FROM users WHERE email = ? OR userid = ?");
        $arr = array($username, $username);
        $sql->execute($arr);
        
        $res = $sql->setFetchMode(PDO::FETCH_ASSOC);  
        {
            foreach ($sql->fetchAll() as $v)
            {
                $pass = $v;
            }
        if (password_verify($password, $pass['password']))
        {
            if ($pass['verified'] == 1)
            {
                echo '<script>alert("Password Correct")</script>';
                echo '<script>window.location = "#" </script>';
            }
            else
            {
                echo '<script>alert("User account not yet verified. Please check your email for verification. If not found search on spam")</script>';
                echo '<script>window.location = "../login.php" </script>';
            }
        }
            else
        {
            echo '<script>alert("Username or Password Incorrect")</script>';
            echo '<script>window.location = "../login.php" </script>';
        }
    }
}
?>