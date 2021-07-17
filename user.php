<?php
session_start();
include("db.php");

if(!isset($_SESSION['user'])) {
    header("Location:login.php?login=false");
}

$get_category = "SELECT DISTINCT b_category FROM book GROUP BY b_category";
$category_result = mysqli_query($conn, $get_category);

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

    <!-- Account setting style -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");
        body {
            background: #f9f9f9;
            font-family: "Roboto", sans-serif;
        }

        hr {
            border-style: solid none none;
            border-width: 3px;
            border-color: black;
            margin: 10px 0;
        }

        footer {
            margin-left: -15%;
            margin-right: -15%;
        }

        .shadow {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
        }

        .profile-tab-nav {
            min-width: 250px;
            padding: 20px;
        }

        .tab-content {
            flex: 1;
            padding: 20px 50px 50px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .nav-pills a.nav-link {
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
            color: #333;
        }
        .nav-pills a.nav-link i {
            width: 20px;
        }

        .preference-data {
            color: #d67b22;
            font-size: 24px;
        }

        .img-circle img {
            height: 100px;
            width: 100px;
            border-radius: 100%;
            border: 5px solid #fff;
        }
    </style>

</head>
<body>
    <?php
    include("masterpage/navbar.php");
    ?>

        <div class="container">
			<h1 class="mb-5 text-center">Account Settings</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-user text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						<a class="nav-link" id="preference-tab" data-toggle="pill" href="#preference" role="tab" aria-controls="preference" aria-selected="false">
							<i class="fa fa-heart text-center mr-1"></i> 
							Preference
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">

                    <!--------- Account Tab Content ------------>
					<div class="tab-pane fade active in" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <form action="authenticate.php" method="post">
                            <h3 class="mb-4">Account Settings</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['user']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="number" class="form-control" name="edit_age" value="<?php echo $_SESSION['user_age']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_gender">Gender</label>
                                        <?php
                                            if(isset($_SESSION['user_gender']) && $_SESSION['user_gender'] == "Male") {
                                                echo 
                                                "<select id='edit_gender' name='edit_gender' class='form-control' required>
                                                    <option selected>Male</option>
                                                    <option>Female</option>
                                                </select>";
                                            }
                                            else {
                                                echo 
                                                "<select id='edit_gender' name='edit_gender' class='form-control' required>
                                                    <option>Male</option>
                                                    <option selected>Female</option>
                                                </select>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_location">Location</label>
                                        <select id="edit_location" name="edit_location" class="form-control" required>
                                            <?php
                                                $location = array("Malaysia", "Singapore", "United States", "United Kingdom", "India", "China");
                                                foreach($location as $loc) {
                                            ?>
                                            <option <?php if($loc == $_SESSION['user_location']) {
                                                        echo "selected";
                                                    } ?>> <?php echo $loc; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="edit_email" value="<?php echo $_SESSION['user_email']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="update-profile-btn" type="submit" class="btn btn-primary" name="update-profile-btn">Update Profile</button>
                            </div>
                        </form>
					</div>

                    <!--------- Password Tab Content ------------>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Password Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Old password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>New password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm new password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div>
							<button id="update-password-btn" type="submit" class="btn btn-primary" name="update-password-btn">Update Password</button>
						</div>
					</div>

                    <!--------- Preference Tab Content ------------>
					<div class="tab-pane fade" id="preference" role="tabpanel" aria-labelledby="preference-tab">
                        <h3 class="mb-4">Current Preference</h3>
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Book Category Preference (1st)</label> <br>
								  	<label class="preference-data"> <?php echo $_SESSION['user_prefer_cate1']; ?> </label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Book Category Preference (2nd)</label> <br>
                                    <label class="preference-data"> <?php echo $_SESSION['user_prefer_cate2']; ?> </label>
								</div>
							</div>
						</div>

                        <hr>
                        <h3 class="mb-4">Preference Settings</h3>
                        <form action="authenticate.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_category_prefer1">Book Category Preference (1st)</label>
                                        <select id="edit_category_prefer1" name="edit_category_prefer1" class="form-control" required>
                                            <option disabled selected value> -- select an option -- </option>
                                            <?php
                                                while($row = mysqli_fetch_assoc($category_result)) {
                                                    echo "<option>".$row['b_category']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_category_prefer2">Book Category Preference (2nd)</label>
                                        <select id="edit_category_prefer2" name="edit_category_prefer2" class="form-control" required>
                                            <option disabled selected value> -- select an option -- </option>
                                            <?php
                                                mysqli_data_seek($category_result, 0);
                                                while($row = mysqli_fetch_assoc($category_result)) {
                                                    echo "<option>".$row['b_category']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button id="update-preference-btn" type="submit" class="btn btn-primary" name="update-preference-btn">Update Preference</button>
                            </div>
                        </form>
					</div>	
		</div>

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