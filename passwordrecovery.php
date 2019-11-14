<main>
<?php
$email = $_GET['id'];
require("header.php");
require("includes/change.php");
?>
<div class="container">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="row">                
        </div>
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Create new password</div>
            </div> 
            <div class="panel-body" >
<form actiom="login.php" method="POST" name ="form">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" name="newpassword" placeholder="New Password"required><br>
</div>
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" name="retypepassword" class="form-control" placeholder="Retype password"required><br>
</div>
<div class="form-group">
<input class=" btn btn-block mybtn btn-primary tx-tfm"  type="submit" name="update" value="update"> 
</div>
</form>
</div>
</main> 