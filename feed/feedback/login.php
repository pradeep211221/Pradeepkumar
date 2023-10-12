<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $result=mysql_query($con,"select * from student where email='$email'");
    $row=mysqli_fetch_assoc($result);    
        if (mysqli_num_rows($result) > 0) {
                    if ($password==$row['possword']) {
                        $_SESSION["login"]=true;
                        header("location:index.php");
            }
            else{
                echo "<script type='text/javascript'> alert('wrong possword')</script>";
            }
        }
    } else {
    echo "<script type='text/javascript'> alert('user not registered')</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <h4>It's free and only takes a minute</h4>
        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="register.php">Sign up</a></p>
    </div>
</body>
</html>
