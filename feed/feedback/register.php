<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname']; // Fix typo here
    $gender = $_POST['gender'];
    $number = $_POST['num'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];

    // Check if email is unique
    $check_query = "SELECT * FROM student WHERE email = '$email'";
    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) == 0) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO student (name, lname, gender, number, email, password) VALUES ('$firstname', '$lastname', '$gender', '$number', '$email', '$hashed_password')";
        mysqli_query($con, $query);

        echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Email is already registered')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-1">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <h4>It's free and only takes a minute</h4>
        <form method="POST">
            <label>First Name</label>
            <input type="text" name="fname" required>
            <label>Last Name</label>
            <input type="text" name="lname" required>
            <label>Gender</label>
            <input type="text" name="gender" required>
            <label>Number</label>
            <input type="text" name="num" required>
            <label>Email</label>
            <input type="email" name="mail" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" value="Submit">
        </form>
        <p>By clicking the sign-up button, you agree to our<br><a href="#">terms and conditions</a></p>
        <p>Already have an account?<br><a href="login.php">Login here</a></p>
    </div>
</body>

</html>
