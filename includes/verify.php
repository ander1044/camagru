<?php

    include_once("connect.php");

    $user = $_GET['v'];
    try 
    {
        $sql = $con->prepare("SELECT * FROM users WHERE token = ?");
        $sql->execute([$user]);

        $res = $sql->setFetchMode(PDO::FETCH_ASSOC); 
        {
            foreach ($sql->fetchAll() as $v)
            {
                $ver = $v;
            }
            if ($ver['verified'] == 0)
            {
                $update = $con->prepare("UPDATE users SET verified = 1 WHERE token = ?");
                if ($update->execute([$user]) === TRUE)
                {
                    echo "email verified";
                }
            }
            else
            {
                echo "email already verified";
            }
        }
        $con = null;
    }
    catch(PDOException $e)
    {
        echo $e;
    }
?>