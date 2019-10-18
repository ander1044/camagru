<?php
$email = $_POST['email'];
$fullname = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

echo "mail:" .$email. "<br>";
echo "name:" .$fullname. "<br>";
echo "user:" .$username. "<br>";
echo "password:" .$password. "<br>";
echo "repassword:" .$repassword;

?>