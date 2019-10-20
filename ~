<?php
include_once("connect.php");
function validPass($password)
{
    if(strlen($password) >= 8){
        if(!ctype_alpha($password) && !ctype_lower($password)){
            return TRUE;
        }
    }
}
if (isset($_POST['signup']))
{
    $email = $_POST['email'];
    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $gender = $_POST['gender'];

    if (empty($email) || empty($fullname) 
    || empty($username) || empty($password) || empty($repassword || empty($gender)))
    {
        header("Location: ../signup.php?error=emptyfields");
        exit();
    }
    elseif ($password !== $repassword)
    {
        header("Location: ../signup.php?error=passwordnotmatching");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../signup.php?error=invalidmail");
        exit();
    }
    elseif (validPass($password) !== TRUE)
    {
        header("Location: ../signup.php?error=invalidpassword");
        exit();
    }
    else if(!preg_match("/^[a-zA-Z ]*$/", $fullname))
    {
        header("Location: ../signup.php?error=invalidnameformat");
        exit();
    }
     else
     {
         $hashing = password_hash($password, PASSWORD_DEFAULT);
         echo "mail: " .$email. "<br>";
echo "name: " .$fullname. "<br>";
echo "user: " .$username. "<br>";
echo "password: " .$hashing. "<br>";
echo "repassword: " .$repassword. "<br>";
echo "gender:" .$gender;

        $ver = 0;
        $sql = $con->prepare("INSERT INTO users (firstname, lastname, userid, password, gender, email, verified) 
        VALUES (?,?,?,?,?,?,?)");
      $sql->bind_param("sssssss",$fullname, $fullname, $username, $password,$gender,$email, $ver);
    $sql->execute(); 
    }


}
?> 