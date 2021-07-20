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
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
    $cate1 = $_POST['category_prefer1'];
    $cate2 = $_POST['category_prefer2'];

    $cate_1 = mysqli_real_escape_string($conn, $cate1);
    $cate_2 = mysqli_real_escape_string($conn, $cate2);

    $signup_query = "INSERT INTO users (username, age, gender, location, email, password, prefer_cate1, prefer_cate2) VALUES ('$username', '$age', '$gender', '$location', '$email', '$passwordConf', '$cate_1', '$cate_2')";
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
            $_SESSION['user_age'] = $row['age'];
            $_SESSION['user_gender'] = $row['gender'];
            $_SESSION['user_location'] = $row['location'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_prefer_cate1'] = $row['prefer_cate1'];
            $_SESSION['user_prefer_cate2'] = $row['prefer_cate2'];
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

    $esp_updated_cate1 = mysqli_real_escape_string($conn, $updated_cate1);
    $esp_updated_cate2 = mysqli_real_escape_string($conn, $updated_cate2);

    $update_preference_query = "UPDATE users SET prefer_cate1='$esp_updated_cate1', prefer_cate2='$esp_updated_cate2' WHERE id='".$_SESSION['user_id']."' ";
    if(mysqli_query($conn, $update_preference_query)) {
        $_SESSION['user_prefer_cate1'] = $updated_cate1;
        $_SESSION['user_prefer_cate2'] = $updated_cate2;

        $_SESSION['update_sts'] = "Your preference has been updated successfully! ";
        $_SESSION['sts_code'] = "success";
        header('Location: user.php');
    }
    else {
        $_SESSION['update_sts'] = "Database internal error occurred! ";
        $_SESSION['sts_code'] = "error";
        header('Location: user.php');
    }
}

//if user clicks on update profile button
if(isset($_POST['update-profile-btn'])) {
    $edit_age = $_POST['edit_age'];
    $edit_gender = $_POST['edit_gender'];
    $edit_location = $_POST['edit_location'];
    $edit_email = $_POST['edit_email'];

    $update_profile_query = "UPDATE users SET age='$edit_age', gender='$edit_gender', location='$edit_location', email='$edit_email' WHERE id='".$_SESSION['user_id']."' ";
    if(mysqli_query($conn, $update_profile_query)) {
        $_SESSION['user_age'] = $edit_age;
        $_SESSION['user_gender'] = $edit_gender;
        $_SESSION['user_location'] = $edit_location;
        $_SESSION['user_email'] = $edit_email;

        $_SESSION['update_sts'] = "Your personal profile has been updated successfully! ";
        $_SESSION['sts_code'] = "success";
        header('Location: user.php');
    }
    else {
        $_SESSION['update_sts'] = "Database internal error occurred! ";
        $_SESSION['sts_code'] = "error";
        header('Location: user.php');
    }
}

?>