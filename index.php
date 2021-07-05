<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location:login.php?login=false");
}

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
            <h3 style="margin: 10px 0; padding: 0 15px;">Filtering Section</h3>
            <div class="col-md-2 inner-filtering">
                <div class="inner-filtering-header">Preference:</div>
                <div class="inner-filtering-header">Date:</div>
                <div class="inner-filtering-header">Price:</div>
            </div>
            <div class="col-md-2 inner-filtering">
                <div>
                    <input id="category_1" type="radio" name="preferences" value="<?php echo $_SESSION['user_prefer_cate1']; ?>" checked>
                    <label for="category_1"> <?php echo $_SESSION['user_prefer_cate1']; ?> </label>
                </div>
                <div>
                    <input id="newest" type="radio" name="date-order" value="Newest to oldest">
                    <label for="newest">Newest to oldest</label>
                </div>
                <div>
                    <input id="free" type="radio" name="price" value="Free">
                    <label for="free">Free</label>
                </div>
            </div>
            <div class="col-md-2 inner-filtering">
                <div>
                    <input id="category_2" type="radio" name="preferences" value="<?php echo $_SESSION['user_prefer_cate2']; ?>">
                    <label for="category_2"> <?php echo $_SESSION['user_prefer_cate2']; ?> </label>
                </div>
                <div>
                    <input id="relevance" type="radio" name="date-order" value="Relevance" checked>
                    <label for="relevance">Relevance</label>
                </div>
                <div>
                    <input id="paid" type="radio" name="price" value="Paid" checked>
                    <label for="paid">Paid</label>
                </div>
            </div>
            <div class="col-md-2 inner-filtering">
                <div>
                    <input id="p_author" type="radio" name="preferences" value="<?php echo $_SESSION['user_prefer_author']; ?>">
                    <label for="p_author"> <?php echo $_SESSION['user_prefer_author']; ?> </label>
                </div>
                <div>
                    <input id="oldest" type="radio" name="date-order" value="Oldest to newest">
                    <label for="oldest">Oldest to newest</label>
                </div>
            </div>
        </div>

        <div class="row">
            <h3 class="home-title">POPULAR BOOKS</h3>
        </div>

        <div class="row text-center">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="book.php">
                        <div class="book-block">
                            <img class="block-center book-image" src="">
                            <hr>
                            <div class="book-title"></div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="book.php">
                    <div class="book-block">
                        <img class="block-center book-image" src="">
                        <hr>
                        <div class="book-title"></div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="book.php">
                    <div class="book-block">
                        <img class="block-center book-image" src="">
                        <hr>
                        <div class="book-title"></div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="book.php">
                    <div class="book-block">
                        <img class="block-center book-image" src="">
                        <hr>
                        <div class="book-title"></div>
                    </div>
                    </a>
                </div>
        </div>
        <div class="row text-center">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="book.php">
                        <div class="book-block">
                            <img class="block-center book-image" src="">
                            <hr>
                            <div class="book-title"></div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="book.php">
                    <div class="book-block">
                        <img class="block-center book-image" src="">
                        <hr>
                        <div class="book-title"></div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="book.php">
                    <div class="book-block">
                        <img class="block-center book-image" src="">
                        <hr>
                        <div class="book-title"></div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <a href="book.php">
                    <div class="book-block">
                        <img class="block-center book-image" src="">
                        <hr>
                        <div class="book-title"></div>
                    </div>
                    </a>
                </div>
        </div>
    </div>

    <?php
        include("masterpage/footer.php");  
    ?>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>	