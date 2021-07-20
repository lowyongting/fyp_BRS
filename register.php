<?php
session_start();
include("db.php");

$get_category = "SELECT DISTINCT b_category FROM book GROUP BY b_category";
$category_result = mysqli_query($conn, $get_category);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRS User Register</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <link href="css/styles.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>
        .register-box {
            margin-top: 4%;
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
            <div class="col-md-4 register-box">

                <form action="authenticate.php" method="post">
                        <div class = "form-group fontuser">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control form-control-lg rounded-pill check_username" name="username" placeholder="username" required>
                            <small class="error_username" style="color: red;"></small>
                        </div>

                        <div class = "form-group fontuser">
                            <label for="age">Age</label>
                            <input id="age" type="number" class="form-control form-control-lg rounded-pill check_age" name="age" min="10" max="100" required>
                        </div>

                        <div class = "form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class = "form-group">
                            <label for="location">Location</label>
                            <select id="location" name="location" class="form-control" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Malaysia</option>
                                <option>Singapore</option>
                            </select>
                        </div>

                        <div class = "form-group fontuser">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control form-control-lg rounded-pill check_email" name="email" placeholder="email" required>
                            <small class="error_email" style="color: red;"></small>
                        </div>

                        <div class = "form-group fontpassword">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control form-control-lg rounded-pill check_password" name="password" placeholder="password" required>
                            <small class="error_Password" style="color: red;"></small>
                        </div>

                        <div class = "form-group fontpassword">
                            <label for="passwordConf">Confirm Password</label>
                            <input id="passwordConf" type="password" class="form-control form-control-lg rounded-pill check_confirm_password" name="passwordConf" placeholder="confirm password" required>
                            <small class="error_confPass" style="color: red;"></small>
                        </div>

                        <div class = "form-group">
                            <label for="category_prefer1">Book Category Preference (1st)</label>
                            <select id="category_prefer1" name="category_prefer1" class="form-control" required>
                                <option disabled selected value> -- select an option -- </option>
                                <?php
                                    while($row = mysqli_fetch_assoc($category_result)) {
                                        echo "<option>".$row['b_category']."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class = "form-group">
                            <label for="category_prefer2">Book Category Preference (2nd)</label>
                            <select id="category_prefer2" name="category_prefer2" class="form-control" required>
                                <option disabled selected value> -- select an option -- </option>
                                <?php
                                    mysqli_data_seek($category_result, 0);
                                    while($row = mysqli_fetch_assoc($category_result)) {
                                        echo "<option>".$row['b_category']."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class = "form-group">
                            <button id="submit_button" type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg rounded-pill btn-login">Register</button>
                        </div>
                        <p class="text-center signup-info">Already a member? <a href="login.php">Sign In</a></p>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/validate.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php 
        if(isset($_SESSION['register_sts']) && $_SESSION['register_sts'] != "")
        {
            ?>
                <script>
                    swal({
                        title: "<?php echo $_SESSION['register_sts']; ?>",
                        icon: "<?php echo $_SESSION['sts_code']; ?>",
                        button: "Ok",
                    });
                </script>
            <?php
                unset($_SESSION['register_sts']);
        }
    ?>

</body>
</html>	