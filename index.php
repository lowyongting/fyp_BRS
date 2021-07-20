<?php
session_start();
include("db.php");

if(!isset($_SESSION['user'])) {
    header("Location:login.php?login=false");
}

// $delete_weird_data = "DELETE FROM book WHERE b_id='LRbWDwAAQBAJ' ";
// mysqli_query($conn, $delete_weird_data);

// $delete_weird_data = "DELETE FROM book WHERE b_category='Church year sermons' ";
// mysqli_query($conn, $delete_weird_data);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Recommender System</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="css/styles.css" rel="stylesheet">
 
</head>
<body>
    <?php
    include("masterpage/navbar.php");
    ?>

    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>
                      
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img class="" src="img/carousel/1.jpg">
            </div>

            <div class="item">
                <img class="img-responsive carousel-image" src="img/carousel/2.jpg">
            </div>

            <div class="item">
                <img class="img-responsive carousel-image" src="img/carousel/3.jpg">
            </div>

            <div class="item">
                <img class="img-responsive carousel-image"src="img/carousel/4.jpg">
            </div>

            <div class="item">
                <img class="img-responsive carousel-image" src="img/carousel/5.jpg">
            </div>

            <div class="item">
                <img class="img-responsive carousel-image" src="img/carousel/6.jpg">
            </div>
        </div>
    </div>

 
    <div class="container-fluid" id="new">

        <div class="row filtering-section">

            <form method="post">
                <div class="row">
                    <h3 style="margin: 10px 0; padding: 0 15px;">Filtering Section</h3>
                    <div class="col-md-2 inner-filtering">
                        <div class="inner-filtering-header">Preference:</div>
                    </div>
                    <div class="col-md-3 inner-filtering">
                        <div>
                            <input id="category_1" type="radio" name="preferences" value="<?php echo $_SESSION['user_prefer_cate1']; ?>" required>
                            <label for="category_1"> <?php echo $_SESSION['user_prefer_cate1']; ?> </label>
                        </div>
                    </div>
                    <div class="col-md-3 inner-filtering">
                        <div>
                            <input id="category_2" type="radio" name="preferences" value="<?php echo $_SESSION['user_prefer_cate2']; ?>">
                            <label for="category_2"> <?php echo $_SESSION['user_prefer_cate2']; ?> </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <button type="submit" name="filter-btn" class="btn btn-primary btn-block btn-md rounded-pill btn-filter">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Start displaying books based on user preference -->
        <?php
            $selected_preference = $_SESSION['user_prefer_cate1'];
            if(isset($_POST['filter-btn'])) {
                $selected_preference = $_POST['preferences'];
            }
            $esp_preference = mysqli_real_escape_string($conn, $selected_preference);

            $view_preference_product_query = "SELECT b_id, b_title, b_img_link FROM book WHERE b_category='".$esp_preference."' ";
            $view_preference_product_query_result = mysqli_query($conn, $view_preference_product_query);

            //Initialize item value and counter value
            $item = 0;
            $i = 0;

            //Display title
            echo 
            "<div class='row'>
                <h3 class='home-title'>Currently showing: ".$selected_preference." Books</h3>
            </div>";

            while($book_row = mysqli_fetch_array($view_preference_product_query_result)) {

                if($item % 4 == 0) { echo "<div class='row text-center'>"; }
                //increment the number of items
                $item++;

                //get necessary book data to be displayed
                $book_id = $book_row['b_id'];
                $book_title = $book_row['b_title'];
                $book_img = $book_row['b_img_link'];

                //Display book
                echo 
                "<div class='col-sm-6 col-md-3 col-lg-3'>
                    <a href='book.php?id=".$book_id."' target='_blank'>
                        <div class='book-block'>
                            <img class='block-center book-image' src='".$book_img."'>
                            <hr>
                            <div class='book-title'>".$book_title."</div>
                        </div>
                    </a>
                </div>";

                $i++;
                if($i % 4 == 0) { echo "</div>"; }
            }

            if($i % 4 != 0) { echo "</div>"; }
            echo "<br> Total items: ".$i;

        ?>

    </div>

    <?php
        include("masterpage/footer.php");  
    ?>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</body>
</html>	