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
        $select = $con->prepare("SELECT * FROM users WHERE email = ? OR userid = ?");
        $array = array($email, $username);
        $select->execute($array);
        $res = $select->setFetchmode(PDO::FETCH_ASSOC);
        foreach($select->fetchAll() as $v)
        {
            $arr = $v;
        }
        if (empty($v))
        {
            $options = [
            'cost' => 12,
            ];
            $hashing = password_hash($password, PASSWORD_BCRYPT, $options);
            $ver = 0;
            $sql = $con->prepare("INSERT INTO users (firstname, lastname, userid, password, gender, email, verified) 
            VALUES (?,?,?,?,?,?,?)");
            $arr = array($fullname, $fullname, $username, $hashing, $gender,$email, $ver);
        if ($sql->execute($arr) === TRUE)
        {
            $checker = bin2hex(random_bytes(10));
            $token = random_bytes(32);
            $link = "http:localhost:8080/camagru/includes/verify.php?checker=" .$checker. "&validator=" .bin2hex($token)."&id=".$username;
            $expiry = date("U") + 900;
            $message = "copy the link and past it in your browser: ".$link;
            mail($email,"Confirm your Email",$message);
            echo '<script>alert("Registered Successfully. Please check your email for a verification link")</script>';
            echo '<script>window.location="../login.php"</script>';
        }
        else
        {
            echo '<script>alert("Registration not Succesful. Please try again later")</script>';
            echo '<script>window.location="../signup.php"</script>';
        }
        }
        else
        {
            echo '<script>alert("The email or username already exit in the system. Please try another one")</script>';
            echo '<script>window.location = "../signup.php"</script>';
        }
    }
}
?> 