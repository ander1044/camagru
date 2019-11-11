<?php
  
session_start();
if (!isset($_SESSION['login']))
{
    echo '<script>window.location="login.php"</script>';
}
require("includes/change.php");
require 'header.php';
$email = $_SESSION['email'];
?>
<body>
<hr>
    <form method = "POST">
        <input type="email" class="form-control" name = "email" placeholder="enter new email" required>
        <input type = "submit" class="btn btn-primary"  name = "email_change" value = "change email" class="btn default">
    </form>
    <hr>
    <form method = "POST" action = "#">
        <input type="password" class="form-control" name = "newpassword" placeholder="Enter new Password" required>
        <input type="password" class="form-control" name = "retypepassword" placeholder="Enter new Password" required>
        <input type = "submit" class="btn btn-primary"  name = "update" value = "change password" class="btn default">
    </form>
    <hr>
    <form method = "POST" action = "#">
    Do you want to continue recicieving emails on notifications?
    <input type="radio" name="notif" value="yes">YES
    <input type="radio" name="notif" value="no">NO
    <input type = "submit" class="btn btn-primary" name = "notific" value = "Change Notification" class="btn default">
    </form>
</body>
