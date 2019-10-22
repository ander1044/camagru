<?php

    include_once("connect.php");
    if (isset($_POST['email_change']))
    {
        
        $change = $_POST['email'];
        $userid = "lucky";
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
?>