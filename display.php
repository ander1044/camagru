 <body>
<?php 
include_once("includes/connect.php");
require("includes/likes.php");
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
    //$_SESSION['pos'] = 0;
    if (empty($_SESSION['pos']))
    {
        $_SESSION['pos'] = 0;
    }
    if ($_SESSION['pos'] <= $x)
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
                    <div class="container">
                    <img src = "<?php  echo $v['target']?>" class="img-rounded" alt = "<?php  echo $v['image']?>" style = "width: 500px;height: 300px;display: block;">
                    <?php 
                    $like = $con->prepare("SELECT COUNT(id) as co FROM likes WHERE imageid = ?");
                    if ($like->execute([$v['imageid']]))
                    {
                        $res = $like->fetchAll();
                        echo "Likes: ".$res[0]["co"];
                    }
                    ?>
                    <div class = "">
                        <?php
                        if (isset($_SESSION['login']))
                        {
                        $try = $con->prepare("SELECT id FROM likes WHERE imageid = ?");
                        $a = array( $v['imageid']);
                        if ($try->execute($a) === TRUE)
                        {
                           $res = $try->fetchAll();
                           if (empty($res))
                           {
                               ?>
                            <form method = "post">
                            <input type = "hidden" name = "id" value = "<?php echo $v['imageid']?>">
                            <button  name = "like" class="btn btn-primary btn-sm">
                            <span class="glyphicon glyphicon-thumbs-up"></span>like
                        </button>
                        </form>
                            <?php
                            }
                        else
                            {   
                                ?>
                                <form method = "post">
                                <input type = "hidden" name = "id" value = "<?php echo $v['imageid']?>">
                                <button name = "like" class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-thumbs-down"></span>unlike
                            </button>
                            </form>
                                <?php
                            }
                        }

                        $try = $con->prepare("SELECT userid, comments FROM comments WHERE imageid = ? ");
                        $a = array( $v['imageid']);
                        if ($try->execute($a) === TRUE)
                        {
                           foreach($try->fetchAll() as $com)
                           {
                               ?><div class="col-sm-8">
                                <div  class="well">
                               <img src="avatar/avatar.png" class="img-circle" height="55" width="55" alt="Avatar">
                               <?php echo $com["userid"]?><br>
                               <?php echo $com["comments"]?>
                           </div>
                           </div>
                               <?php
                           }
                        }
                        ?>
                        
                    </div>
                    <div class ="">
                        <form method = "post">
                            <textarea class="form-control" rows="5" id="comment" name = "comment" placeholder ="comments"></textarea>
                            <input type = "hidden" name = "id" value = "<?php echo $v['imageid']?>">
                            <input type = "hidden" name = "userid" value = "<?php echo $v['userid']?>">
                            <button name = "commet" class="btn btn-primary">Comment</button>
                        </form>
                    </div>
                        <?php
                            if (!strcmp($_SESSION['login'], $v['userid']))
                            {
                        ?>
                    <div class = "">
                        <form method = "post">
                        <input type = "hidden" name = "id" value = "<?php echo $v['imageid']?>">
                        <button class="btn btn-danger" name = "delete">Delete Image</button>
                        </form>
                    </div>
                    <?php
                            }
                }
            }
            }
        }
    }
    else
    {
        echo '<script>alert("No more pictures to view")</script>';
        $_SESSION['pos'] = $_SESSION['pos'] - 5;
        echo '<script> window.location= "home.php"</script>';
    }
}
catch(PODEXception $e)
{
    echo $e;
}
?>
<div class="container">
<hr>
<form method = "post" action = "home.php">
<input type = "submit" class="btn btn-primary" value = "next" name  = "next">
</form>
<?php if($_SESSION['pos'] > 0)
{?>
<form method = "post" action = "home.php">
<input type = "submit" class="btn btn-primary"  value = "prev" name  = "prev">
</form>
<?php }?>
</body>