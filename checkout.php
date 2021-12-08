<?php
session_start();

require ('db.php');

if(!isset($_SESSION['user'])) {
    header("Location:login.php?login=false");
}

//Get all items from the cart added by the user
$order_preview_query = "SELECT users.id, book.b_id, book.b_title, book.b_price, cart.quantity FROM users JOIN cart ON id=cart.user_id JOIN book ON b_id=cart.book_id WHERE users.id='".$_SESSION['user_id']."' ";
$order_preview_query_result = mysqli_query($conn, $order_preview_query);

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

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 18px;
            margin-bottom: 5%;
        }

        th {
            background-color: #d67b22;
            color: white;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}
        
        tr:hover {
            background-color: lightgrey;
        }

    </style>

</head>
<body>
    <?php
    include("masterpage/navbar.php");
    ?>

    <div class="container-fluid" id="cart">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="cart-title"> ORDER PREVIEW </h2>
            </div>
        </div>

        <div class="row">
            
            <table>
                <tr>
                    <th>Item Name</th>
                    <th>Price Per Item</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>

                <?php

                    if(mysqli_num_rows($order_preview_query_result) > 0) 
                    {
                        while($preview_item = mysqli_fetch_assoc($order_preview_query_result)) 
                        {
                            $current_total = $preview_item['b_price'] * $preview_item['quantity'];

                            echo
                            "<tr>
                                <td>".$preview_item['b_title']."</td>
                                <td> RM ".number_format($preview_item['b_price'],2)."</td>
                                <td>".$preview_item['quantity']."</td>
                                <td> RM ".number_format($current_total,2)."</td>
                            </tr>
                            ";
                        }
                    }

                ?>
                
            </table>

        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <a href='cart.php' class='btn btn-lg btn-cont-browsing'>Back to Cart</a>
                <button type="submit" name="checkout-btn" class="btn btn-lg btn-cont-browsing">Checkout</button>
            </div>
        </div>  

    <!-- end of container -->
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>	