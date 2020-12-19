<?php
    include_once("connect.php");
    //session_start();
    if (isset($_POST['login']))
    {
        $username = strip_tags($_POST['username']);
        $password = $_POST['password'];
        if (empty($username) || empty($password))
        {
            exit();
        }
        try
        {
            $sql = $con->prepare("SELECT * FROM users WHERE email = ? OR userid = ?");
            $arr = array($username, $username);
            $sql->execute($arr);
            
            $res = $sql->setFetchMode(PDO::FETCH_ASSOC); 
            foreach ($sql->fetchAll() as $v)
            {
                $pass = $v;
            }
            if (isset($pass))
            {
                if (password_verify($password, $pass['password']))
                {
                    if ($pass['verified'] == 1)
                    {
                        $_SESSION['login'] = $pass['userid'];
                        $_SESSION['email'] = $pass['email'];
                        //header("Location: home.php");
                        echo '<script>window.location = "home.php" </script>';
                    }
                    else
                    {
                        echo '<script>alert("User account not yet verified. Please check your email for verification. If not found search on spam")</script>';
                    }
                }
                    else
                {
                    echo '<script>alert("Username or Password Incorrect")</script>';
                }
            }
            else
            {
                echo '<script>alert("Username or Password Incorrect")</script>';
            }
            $con = null;
        }
        catch(PDOException $e)
        {
            echo "error".$e;
        }
    }
?>