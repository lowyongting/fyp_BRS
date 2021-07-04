<?php
session_start();

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

 
    <div class="container-fluid text-center" id="new">
    <h3 style="text-align: left;">POPULAR BOOKS</h3>
        <div class="row">
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
        <div class="row">
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

    <?php 
        if (isset($_GET['login']) && $_GET['login'] == "false") {
            ?>
            <script>
                swal({
                        title: "Please login to browse the book.",
                        icon: "info",
                        button: "Ok"
                });
            </script>
        <?php
        }    
    ?>

    <?php 
        if (isset($_GET['message'])) {
            $mssg = $_GET['message'];
            ?>
            <script>
                swal({
                        title: "<?php echo $mssg ?>",
                        icon: "success",
                        button: "Ok"
                });
            </script>
        <?php
        }    
    ?>

</body>
</html>	