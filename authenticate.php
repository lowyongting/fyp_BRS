<?php
session_start();

require ('db.php');

//Validate if newly entered email exists
if(isset($_POST['check_submit_email'])) {
    $email = $_POST['email_id'];

    if($email == "") {
        echo "Please enter the email.";
    }

    $email_query = "SELECT * FROM users WHERE email='$email' ";
    $email_query_run = mysqli_query($conn, $email_query);
    if(mysqli_num_rows($email_query_run) > 0) 
    {
        echo "Email already taken. Please try another.";
    }
}

//Validate if newly entered username exists
if(isset($_POST['check_submit_username'])) {
    $username = $_POST['username_id'];

    if($username == "") {
        echo "Please enter the username.";
    }

    $username_query = "SELECT * FROM users WHERE username='$username' ";
    $username_query_run = mysqli_query($conn, $username_query);
    if(mysqli_num_rows($username_query_run) > 0) 
    {
        echo "Username already taken. Please try another.";
    }
}

// if user clicks on the sign up button
if(isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    $signup_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$passwordConf')";
    if(mysqli_query($conn, $signup_query)) {
        $_SESSION['register_sts'] = "Your account has been registered successfully! ";
        $_SESSION['sts_code'] = "success";
        header('Location: register.php');
    }
    else {
        $_SESSION['register_sts'] = "Database internal error occurred! ";
        $_SESSION['sts_code'] = "error";
        header('Location: register.php');
    }
    
}

?>