<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRS User Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <link href="css/styles.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>
        .login-box {
            margin-top: 15%;
        }
        label {
            font-family: 'Poppins';
            font-weight: lighter;
        }
        .btn-login {
            font-size: 14px;
        }
        .signup-info {
            font-size: 12px;
        }
    </style>
</head>
<body>
<?php
include("masterpage/navbar.php");
?>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 login-box">
                <form action="login.php" method="post">
                        
                        <div class = "form-group fontuser">
                           <label for="username">Username or Email</label>
                            <input type="text" class="form-control form-control-lg rounded-pill" name="username" placeholder="username / email">
                            <i class="fa fa-user fa-lg"></i> 
                        </div>
                        
                        <div class = "form-group fontpassword">
                           <label for="password">Password</label>
                            <input type="password" class="form-control form-control-lg rounded-pill" name="password" placeholder="password">
                            <i class="fa fa-lock fa-lg"></i> 
                        </div>
                        
                        <div class = "form-group">
                            <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg rounded-pill btn-login">Login</button>
                        </div>
                        <p class="text-center signup-info">Don't have an account? <a href="register.php">Sign Up</a></p>

                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</body>
</html>	