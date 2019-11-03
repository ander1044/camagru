<body>
<?php 
include_once("includes/connect.php");
require("includes/likes.php");

session_start();
try
{
    $x = 0;
    $sql = $con->prepare("SELECT COUNT(`image`) AS amount FROM images");
    if ($sql->execute() === TRUE)
    {
        $res = $sql->setFetchMode(PDO::FETCH_ASSOC);
        foreach($sql->fetchAll() as $v)
        {
            $c = $v;
        }
    }
    $x = $c['amount'];
    if (empty($_SESSION['pos']))
    {
        $_SESSION['pos'] = 0;
    }
    if ($_SESSION['pos'] < $x || $x === 0)
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
                if (!empty($v))
                {
                    ?>
                    <img src = "<?php  echo $v['target']?>" alt = "<?php  echo $v['image']?>" style = "width: 500px;height: 300px;display: block;">
                    <?php 
                    $like = $con->prepare("SELECT COUNT(id) as co FROM likes WHERE imageid = ?");
                    if ($like->execute([$v['imageid']]))
                    {
                        $res = $like->fetchAll();
                        echo "number of likes: ".$res[0][co];
                    }
                    ?>
                    <div class = "">
                        <form method = "post">
                            <input type = "hidden" name = "id" value = "<?php echo $v['imageid']?>">
                            <button name = "like">like</button>
                        </form>
                    </div>
                    <div class ="">
                        <form method = "post">
                            <textarea name = "id" placeholder ="comments"></textarea>
                            <button name = "commet">Comment</button>
                        </form>
                    </div>
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