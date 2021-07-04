<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location:index.php?login=false");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $_SESSION['user']." Account"; ?> </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="css/styles.css" rel="stylesheet">
 
    <style>
        hr {
            border-style: solid none none;
            border-width: 3px;
            border-color: black;
            margin: 10px 0;
        }
        .current-preference {
            font-size: 15px;
            margin: 30px 0;
            font-weight: 600;
        }
        .preference-data {
            color: #d67b22;
            float: right;
        }
    </style>
</head>
<body>
    <?php
    include("masterpage/navbar.php");
    ?>

    <div id="user_profile" class="container-fluid">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="cart-title"> User Preference Setting </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 user-box">

                <div class="current-preference">
                    <hr>
                    <h2 class="text-center cart-title">Current Preference</h2>
                    <div>
                        Book Category Preference (1st) : 
                        <span class="preference-data">
                            <?php echo $_SESSION['user_prefer_cate1']; ?>
                        </span>
                    </div>
                    <div>
                        Book Category Preference (2nd) : 
                        <span class="preference-data"> 
                            <?php echo $_SESSION['user_prefer_cate2']; ?>
                        </span>
                    </div>
                    <div>
                        Book Author Preference : 
                        <span class="preference-data"> 
                            <?php echo $_SESSION['user_prefer_author']; ?>
                        </span>
                    </div>
                </div>

                <hr>
                <form action="authenticate.php" method="post">

                        <div class = "form-group">
                            <label for="edit_category_prefer1">Book Category Preference (1st)</label>
                            <select id="edit_category_prefer1" name="edit_category_prefer1" class="form-control" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Arts</option>
                                <option>Business</option>
                                <option>Photography</option>
                                <option>Cooking</option>
                                <option>Computer</option>
                                <option>Engineering</option>
                                <option>Health</option>
                                <option>History</option>
                                <option>Humor</option>
                                <option>Law</option>
                                <option>Fiction</option>
                                <option>Mystery</option>
                                <option>Thriller</option>
                                <option>Sport</option>
                                <option>Fantasy</option>
                                <option>Young Adult</option>
                            </select>
                        </div>

                        <div class = "form-group">
                            <label for="edit_category_prefer2">Book Category Preference (2nd)</label>
                            <select id="edit_category_prefer2" name="edit_category_prefer2" class="form-control" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Arts</option>
                                <option>Business</option>
                                <option>Photography</option>
                                <option>Cooking</option>
                                <option>Computer</option>
                                <option>Engineering</option>
                                <option>Health</option>
                                <option>History</option>
                                <option>Humor</option>
                                <option>Law</option>
                                <option>Fiction</option>
                                <option>Mystery</option>
                                <option>Thriller</option>
                                <option>Sport</option>
                                <option>Fantasy</option>
                                <option>Young Adult</option>
                            </select>
                        </div>

                        <div class = "form-group">
                            <label for="edit_author_prefer">Book Author Preference</label>
                            <select id="edit_author_prefer" name="edit_author_prefer" class="form-control" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option>Stephen King</option>
                                <option>J.K. Rowling</option>
                                <option>Martha McPhee</option>
                                <option>Jess Kidd</option>
                                <option>Armando Lucas Correa</option>
                                <option>Megan Miranda</option>
                                <option>Helen Phillips</option>
                                <option>Kristin Harmel</option>
                                <option>Rebecca Serle</option>
                                <option>Lisa Jewell</option>
                                <option>Haruki Murakami</option>
                                <option>Kiley Reid</option>
                                <option>Mary Kubica</option>
                                <option>Stephen Graham Jones</option>
                                <option>None</option>
                            </select>
                        </div>

                        <div class = "form-group">
                            <button id="submit_button" type="submit" name="update-preference-btn" class="btn btn-primary btn-block btn-lg rounded-pill btn-login">Update Preference</button>
                        </div>
                </form>

            </div>
            <div class="col-sm-3"></div>
        </div>
               
    </div>

    <?php
        include("masterpage/footer.php");  
    ?>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php 
        if(isset($_SESSION['update_sts']) && $_SESSION['update_sts'] != "")
        {
            ?>
                <script>
                    swal({
                        title: "<?php echo $_SESSION['update_sts']; ?>",
                        icon: "<?php echo $_SESSION['sts_code']; ?>",
                        button: "Ok",
                    });
                </script>
            <?php
                unset($_SESSION['update_sts']);
        }
    ?>

</body>
</html>	