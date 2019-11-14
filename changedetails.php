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
<div class="container">      
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
    <div class="row">                
    </div>   
    <div class="panel panel-default" >
    <div class="panel-heading">
    <div class="panel-title text-center">Change Details</div>
    </div> 
    <div class="panel-body" >
    <form name="form" method = "POST">
    <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input type="email" class="form-control" name = "email" placeholder="enter new email" required>
        </div>
        <input type = "submit" class=" btn btn-block mybtn btn-primary tx-tfm"  name = "email_change" value = "change email" class="btn default">
    </form>
    <hr>
    <form method = "POST" action = "#">
    <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" name = "newpassword" placeholder="Enter new Password" required>
        </div>
        <div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="password" class="form-control" name = "retypepassword" placeholder="Enter new Password" required>
        </div>
        <input type = "submit" class=" btn btn-block mybtn btn-primary tx-tfm"  name = "update" value = "change password" class="btn default">
    </form>
    <hr>
    <form method = "POST" action = "#">
    Do you want to continue recicieving emails on notifications?
    <input type="radio" name="notif" value="yes">YES
    <input type="radio" name="notif" value="no">NO
    <input type = "submit" class="btn btn-primary" name = "notific" value = "Change Notification" class="btn default">
    </form>
</body>
