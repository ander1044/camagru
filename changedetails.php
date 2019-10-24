<?php
require("includes/change.php");
//require("");
$email = $_SESSION['email'];
echo $email;
?>
<body>
    <form method = "POST">
        <input type="email" name = "email" placeholder="enter new email" required>
        <input type = "submit" name = "email_change" value = "change email" class="btn default">
    </form>
    <hr>
    <form method = "POST" action = "#">
        <input type="password" name = "newpassword" placeholder="Enter new Password" required>
        <input type="password" name = "retypepassword" placeholder="Enter new Password" required>
        <input type = "submit" name = "update" value = "change password" class="btn default">
    </form>
</body>
