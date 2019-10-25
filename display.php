<body>

<?php 
include_once("includes/connect.php");
session_start();

    try
    {
        $x = 0;
        $sql = $con->prepare("SELECT * FROM images");
        if ($sql->execute() === TRUE)
        {
            $res = $sql->setFetchMode(PDO::FETCH_ASSOC);
            foreach($sql->fetchAll() as $v)
                {
                         $x = $x + 1;   
                }
                echo  $x;
        }
        $x = $x; 
        if ($_SESSION['pos'] < $x)
        {
            if (isset($_POST['next']))
            {
                $_SESSION['pos'] = $_SESSION['pos'] + 5;
                echo '<script> window.location= "index.php"</script>';
            }
            if (isset($_POST['prev']))
            {
                $_SESSION['pos'] = $_SESSION['pos'] - 5;
                echo '<script> window.location= "index.php"</script>';
            }
            $pos = $_SESSION['pos'];
            $sql = $con->prepare("SELECT * FROM images ORDER BY `time` DESC LIMIT $pos, 5");
            if ($sql->execute() === TRUE)
            {
                $res = $sql->setFetchMode(PDO::FETCH_ASSOC);    
                foreach($sql->fetchAll() as $v)
                    {
                        if (empty($v) === FALSE)
                        {
                            ?>
                            <img src = "<?php  echo $v['target']?>" alt = "<?php  echo $v['image']?>">
                            <?php
                        }
                    }
                }
        }
        else
        {
           echo '<script>alert("No more pictures to view")</script>';
           $_SESSION['pos'] = $_SESSION['pos'] - 5;
           echo '<script> window.location= "index.php"</script>';
        }
    }
    catch(PODEXception $e)
    {
        echo $e;
    }

?>
<hr>
<form method = "post" action = "index.php">
<input type = "submit" value = "next" name  = "next">
</form>
<?php if($_SESSION['pos'] > 0)
{?>
<form method = "post" action = "index.php">
<input type = "submit" value = "prev" name  = "prev">
</form>
<?php }?>
</body>