<?php
session_start();

if(isset($_POST['like']))
{
    include_once('connect.php');

    try{
        $id = $_POST['id'];
        $try = $con->prepare("SELECT id FROM likes WHERE username = ? AND imageid = ?");
        $a = array($_SESSION['login'], $id);
        if ($try->execute($a) === TRUE)
        {
           $res = $try->fetchAll();
           if (empty($res))
           {
                
                $sql = $con->prepare("INSERT INTO likes (username, imageid) values (?,?)");
                $arr = array($_SESSION['login'], $id);
                $sql->execute($arr);
                echo '<script>window.location="index.php"</script>';
            }
        else
            {   
                $sql = $con->prepare("DELETE FROM likes WHERE username = ? AND imageid = ?");
                $arr = array($_SESSION['login'], $id);
                $sql->execute($arr);
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
    catch(PDOException $e)
    {
        echo $e;
    }
    $con = null;
}

if (isset($_POST['commet']))
{
    $id = $_POST['id'];
    $comment = $_POST['comment'];

    if (empty($comment))
    {
        echo '<script>alert("No Comment")</script>';
    }
    else
    {
        
    }
}
?>