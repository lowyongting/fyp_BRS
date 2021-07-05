<?php
session_start();

require ('db.php');

if(!isset($_SESSION['user'])) {
    header("Location:login.php?login=false");
}

//If the remove button is clicked
if(isset($_GET['remove'])) {
    $remove_book_id = $_GET['remove'];

    $get_book_title_query = "SELECT * FROM cart WHERE book_id='$remove_book_id' ";
    $get_item_result = mysqli_query($conn, $get_book_title_query);
    if(mysqli_num_rows($get_item_result) > 0) {

        $item_row = mysqli_fetch_assoc($get_item_result);
        $book_title = $item_row['book_title'];
        $remove_item_query = "DELETE FROM cart WHERE book_id='$remove_book_id' AND user_id='".$_SESSION['user_id']."' ";

        if(mysqli_query($conn, $remove_item_query)) {
            $_SESSION['removecart_sts'] = $book_title." has been successfully removed from your cart!";
            $_SESSION['sts_code'] = "success";
        }
        else {
            $_SESSION['removecart_sts'] = " Database query execution failed! ";
            $_SESSION['sts_code'] = "error";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="css/styles.css" rel="stylesheet">

</head>
<body>
    <?php
    include("masterpage/navbar.php");
    ?>

    <div class="container-fluid" id="cart">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="cart-title"> YOUR CART ITEMS </h2>
            </div>
        </div>

        <div class="row">
            <?php
                $show_cart_query = "SELECT * FROM cart WHERE user_id=".$_SESSION['user_id']." ";
                $show_cart_query_result = mysqli_query($conn, $show_cart_query);

                if(mysqli_num_rows($show_cart_query_result) == 1) {

                    $item = mysqli_fetch_assoc($show_cart_query_result);

                    echo 
                    "<div class='panel col-sm-6 col-sm-offset-3 text-center'>
                        <div class='panel-heading'> Item 1 </div>
                        <div class='panel-body'>
                            <img class='image-responsive block-center cart-img' src='".$item['book_img_link']."'> <br>
                            <div class='item-details'>
                                Title  : ".$item['book_title']." <br>
                                Author : ".$item['book_author']." <br>
                                Publisher : ".$item['book_publisher']." <br>
                                Category : ".$item['book_category']." <br>
                            </div>                                                           
                            <a href='cart.php?remove=".$item['book_id']."' class='btn btn-sm btn-cart-remove'> Remove </a>
                        </div>
                    </div>";
                }
                else if(mysqli_num_rows($show_cart_query_result) > 1) {
                    $num_of_item = 1; 
                    while($item = mysqli_fetch_assoc($show_cart_query_result)) 
                    {
                        if($num_of_item % 2 == 1)  $offset= 0;
                        if($num_of_item % 2 == 0)  $offset= 2;  
                        echo 
                        "<div class='panel col-sm-5 col-sm-offset-".$offset." text-center'>
                            <div class='panel-heading'> Item ". $num_of_item ." </div>
                            <div class='panel-body'>
                                <img class='image-responsive block-center cart-img' src='".$item['book_img_link']."'> <br>
                                <div class='item-details'>
                                    Title  : ".$item['book_title']." <br>
                                    Author : ".$item['book_author']." <br>
                                    Publisher : ".$item['book_publisher']." <br>
                                    Category : ".$item['book_category']." <br>
                                </div>                                                           
                                <a href='cart.php?remove=".$item['book_id']."' class='btn btn-sm btn-cart-remove'> Remove </a>
                            </div>
                        </div>";
                        $num_of_item++;
                    }
                }
                else {
                    echo 
                    "<div class='col-sm-12 text-center'>
                        <img class='img-empty-cart img-responsive' src='img/empty_cart.jpg' alt='Empty Cart'>
                        <p style='font-size: 25px; margin: 20px;'> You have no items in your shopping cart. </p>
                    </div>";
                }
            ?>
        <!-- end of 2nd row -->
        </div>
    
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="index.php" class="btn btn-lg btn-cont-browsing">Continue Browsing</a>
            </div>
        </div>
        
    <!-- end of container -->
    </div>


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php 
        if(isset($_SESSION['removecart_sts']) && $_SESSION['removecart_sts'] != "")
        {
            ?>
                <script>
                    swal({
                        title: "<?php echo $_SESSION['removecart_sts']; ?>",
                        icon: "<?php echo $_SESSION['sts_code']; ?>",
                        button: "Ok",
                    });
                </script>
            <?php
                unset($_SESSION['removecart_sts']);
        }
    ?>

</body>
</html>		