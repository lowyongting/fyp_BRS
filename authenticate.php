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
    $cate1 = $_POST['category_prefer1'];
    $cate2 = $_POST['category_prefer2'];
    $author_pre = $_POST['author_prefer'];

    $author_prefer = mysqli_real_escape_string($conn, $author_pre);

    $signup_query = "INSERT INTO users (username, email, password, prefer_cate1, prefer_cate2, prefer_author) VALUES ('$username', '$email', '$passwordConf', '$cate1', '$cate2', '$author_prefer')";
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

// if user clicks on login
if(isset($_POST['login-btn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login_query = "SELECT * FROM users WHERE email='$username' OR username='$username' ";
    $login_query_result = mysqli_query($conn, $login_query);

    if(mysqli_num_rows($login_query_result) > 0) {

        $row = mysqli_fetch_assoc($login_query_result);
        $stored_pass = $row['password'];

        if($password == $stored_pass) 
        {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user'] = $row['username'];
            $_SESSION['user_prefer_cate1'] = $row['prefer_cate1'];
            $_SESSION['user_prefer_cate2'] = $row['prefer_cate2'];
            $_SESSION['user_prefer_author'] = $row['prefer_author'];
            header('Location: index.php');
        }
        else 
        {
            $_SESSION['login_sts'] = "Login Failed! Username or password incorrect! ";
            $_SESSION['sts_code'] = "error";
            header('Location: login.php');
        }
    }
    else {
        $_SESSION['login_sts'] = "Login Failed! Username or password incorrect! ";
        $_SESSION['sts_code'] = "error";
        header('Location: login.php');
    }

}

// if user updates his/her preference
if(isset($_POST['update-preference-btn'])) {
    $updated_cate1 = $_POST['edit_category_prefer1'];
    $updated_cate2 = $_POST['edit_category_prefer2'];
    $updated_author = $_POST['edit_author_prefer'];

    $updated_author_prefer = mysqli_real_escape_string($conn, $updated_author);

    $update_prefer_query = "UPDATE users SET prefer_cate1='$updated_cate1', prefer_cate2='$updated_cate2', prefer_author='$updated_author_prefer' WHERE id='".$_SESSION['user_id']."' ";
    if(mysqli_query($conn, $update_prefer_query)) {
        $_SESSION['user_prefer_cate1'] = $updated_cate1;
        $_SESSION['user_prefer_cate2'] = $updated_cate2;
        $_SESSION['user_prefer_author'] = $updated_author_prefer;

        $_SESSION['update_sts'] = "Your preference has been updated successfully! ";
        $_SESSION['sts_code'] = "success";
        header('Location: user.php');
    }
    else {
        $_SESSION['register_sts'] = "Database internal error occurred! ";
        $_SESSION['sts_code'] = "error";
        header('Location: user.php');
    }
}

?>