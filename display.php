<body>

<?php 
include_once("includes/connect.php");
session_start();

try
{
    $userid = $_SESSION['login'];
    $sql = $con->prepare("SELECT * FROM images WHERE userid = ? ORDER BY `time` DESC");
    if ($sql->execute([$userid]) === TRUE)
    {
        $res = $sql->setFetchMode(PDO::FETCH_ASSOC);
        foreach($sql->fetchAll() as $v)
        {
         echo '<img src = "'.$v['target'].'">';
        }
    }
}
catch(PDOException $e)
{
    echo $e;
} 

?>
</body>