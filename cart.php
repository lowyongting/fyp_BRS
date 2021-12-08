<?php
session_start();

require ('db.php');

$book_id_arr = array();

if(!isset($_SESSION['user'])) {
    header("Location:login.php?login=false");
}

//If the remove button is clicked
if(isset($_GET['remove'])) {
    $remove_book_id = $_GET['remove'];

    $get_book_title_query = "SELECT b_title FROM book WHERE b_id='$remove_book_id' ";
    $get_book_title_query_result = mysqli_query($conn, $get_book_title_query);
    if(mysqli_num_rows($get_book_title_query_result) > 0) {

        $item_row = mysqli_fetch_assoc($get_book_title_query_result);
        $book_title = $item_row['b_title'];
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

//Query all cart items for the current logged-in user
$show_cart_query = "SELECT users.id, book.b_id, book.b_title, book.b_publish_date, book.b_publisher, book.b_category, book.b_author, book.b_price, book.b_img_link, cart.quantity FROM users JOIN cart ON id=cart.user_id JOIN book ON b_id=cart.book_id WHERE users.id='".$_SESSION['user_id']."' ";
$show_cart_query_result = mysqli_query($conn, $show_cart_query);

//If the save cart button is clicked
if(isset($_POST['savecart-btn'])) 
{
    $update_sts = "Success";

    for($i = 0; $i < $_SESSION['num_of_cart_items']; $i++) 
    {
        while($cart_row = mysqli_fetch_assoc($show_cart_query_result)) 
        {
            if($cart_row['b_id'] == $_SESSION['book_id_arr'][$i]) 
            {
                $b_id = $_SESSION['book_id_arr'][$i];
                $new_quantity = $_POST['quantity'][$b_id];

                //Update quantity
                $update_cart_query = "UPDATE cart SET quantity='$new_quantity' WHERE book_id='$b_id' ";
                if(mysqli_query($conn, $update_cart_query)) {}
                else
                {
                    $update_sts = "Error";
                }
            }
        }
        mysqli_data_seek($show_cart_query_result, 0);
    }
    
    //Re-execute query and get the latest data
    $show_cart_query_result = mysqli_query($conn, $show_cart_query);

    if($update_sts == "Success") 
    {
        $_SESSION['updatecart_sts'] = "Your cart has been successfully saved! ";
        $_SESSION['sts_code'] = "success";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="pragma" content="no-cache" />
    <title>Cart</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="css/styles.css" rel="stylesheet">

</head>
<body>
    <?php
    include("masterpage/navbar.php");
    ?>

    <form action="" method="post">
        <div class="container-fluid" id="cart">

            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="cart-title"> YOUR CART ITEMS </h2>
                </div>
            </div>

            <div class="row">
                <?php
                    //Move the pointer to the first array item of show cart query result
                    mysqli_data_seek($show_cart_query_result, 0);

                    if(mysqli_num_rows($show_cart_query_result) == 1) {

                        $_SESSION['num_of_cart_items'] = 1;
                        $item = mysqli_fetch_assoc($show_cart_query_result);

                        echo 
                        "<div class='panel col-sm-6 col-sm-offset-3 text-center'>
                            <div class='panel-heading'> Item 1 </div>
                            <div class='panel-body'>
                                <img class='image-responsive block-center cart-img' src='".$item['b_img_link']."'> <br>
                                <div class='item-details'>
                                    Title  : ".$item['b_title']." <br>
                                    Author : ".$item['b_author']." <br>
                                    Publisher : ".$item['b_publisher']." <br>
                                    Category : ".$item['b_category']." <br>
                                    Price : RM ".$item['b_price']." <br>
                                    Quantity: 
                                    <button type='button' id='sub' class='sub'>-</button>
                                        <input type='number' name='quantity[".$item['b_id']."]' value='".$item['quantity']."' min='1' max='' maxlength='4' size='4' required/>
                                    <button type='button' id='add' class='add'>+</button>
                                </div>                            
                                <a href='book.php?id=".$item['b_id']."' class='btn btn-sm btn-cart-remove'> View Book Details </a>                               
                                <a href='cart.php?remove=".$item['b_id']."' class='btn btn-sm btn-cart-remove'> Remove </a>
                            </div>
                        </div>";
                        array_push($book_id_arr, $item['b_id']);
                        $_SESSION['book_id_arr'] = $book_id_arr; 
                    }
                    
                    else if(mysqli_num_rows($show_cart_query_result) > 1) {
                        $num_of_item = 0; 
                        while($item = mysqli_fetch_assoc($show_cart_query_result)) 
                        {
                            $num_of_item++;
                            if($num_of_item % 2 == 1)  $offset= 0;
                            if($num_of_item % 2 == 0)  $offset= 2;  
                            echo 
                            "<div class='panel col-sm-5 col-sm-offset-".$offset." text-center'>
                                <div class='panel-heading'> Item ". $num_of_item ." </div>
                                <div class='panel-body'>
                                    <img class='image-responsive block-center cart-img' src='".$item['b_img_link']."'> <br>
                                    <div class='item-details'>
                                        Title  : ".$item['b_title']." <br>
                                        Author : ".$item['b_author']." <br>
                                        Publisher : ".$item['b_publisher']." <br>
                                        Category : ".$item['b_category']." <br>
                                        Price : RM ".$item['b_price']." <br>
                                        Quantity: 
                                        <button type='button' id='sub' class='sub'>-</button>
                                            <input type='number' id='item".$num_of_item."_quantity' name='quantity[".$item['b_id']."]' value='".$item['quantity']."' min='1' max='' maxlength='4' size='4' required/>
                                        <button type='button' id='add' class='add'>+</button>
                                    </div>   
                                    <a href='book.php?id=".$item['b_id']."' class='btn btn-sm btn-cart-remove'> View Book Details </a>                                                         
                                    <a href='cart.php?remove=".$item['b_id']."' class='btn btn-sm btn-cart-remove'> Remove </a>
                                </div>
                            </div>";
                            array_push($book_id_arr, $item['b_id']);
                        }
                        $_SESSION['num_of_cart_items'] = $num_of_item;
                        $_SESSION['book_id_arr'] = $book_id_arr; 
                    }
                    else {
                        $_SESSION['num_of_cart_items'] = 0;
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
                    <?php
                        if($_SESSION['num_of_cart_items'] > 0) {
                            echo 
                            "<a href='checkout.php' class='btn btn-lg btn-cont-browsing'>Order Preview</a>
                            <button type='submit' name='savecart-btn' class='btn btn-lg btn-cont-browsing'>Save Cart</button>
                            ";
                        }
                    ?>
                </div>
            </div>  
            
        <!-- end of container -->
        </div>

    </form> 

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/quantity.js"></script>

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

    <?php 
        if (isset($_SESSION['updatecart_sts']) && $_SESSION['updatecart_sts'] != "") 
        {
            ?>
                <script>
                    swal({
                            title: "<?php echo $_SESSION['updatecart_sts']; ?>",
                            icon: "<?php echo $_SESSION['sts_code']; ?>",
                            button: "Ok"
                    });
                </script>
            <?php
                unset($_SESSION['updatecart_sts']);
        }    
    ?>

</body>
</html>		