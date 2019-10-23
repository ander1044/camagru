
<body>
    <form method = "POST" action = "includes/change.php">
        <input type="email" name = "email" placeholder="enter new email" required>
        <input type = "submit" name = "email_change" value = "change email" class="btn default">
    </form>
    <hr>
    <form method = "POST" action = "includes/change.php">
        <input type="password" name = "newpassword" placeholder="Enter new Password" required>
        <input type="password" name = "retypepassword" placeholder="Enter new Password" required>
        <input type = "submit" name = "update_p" value = "change password" class="btn default">
    </form>
</body>
