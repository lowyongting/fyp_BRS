<?php
session_start();

include("db.php");

if(!isset($_SESSION['user'])) {
    header("Location:login.php?login=false");
}

if(isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $book_info_query = "SELECT * FROM book WHERE b_id='$book_id' ";
    $book_info_query_result = mysqli_query($conn, $book_info_query);

    if(mysqli_num_rows($book_info_query_result) > 0) {
        $row_book_info = mysqli_fetch_assoc($book_info_query_result);
    }
}

//If the add to cart button is clicked
if(isset($_POST['add-to-cart'])) {
    $book_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $book_title = $row_book_info['b_title'];

    // mysqli_real_escape_string() function escapes special characters in a string for use in an SQL query
    $b_id = mysqli_real_escape_string($conn, $book_id);

    $addcart_query = "INSERT INTO cart (user_id, book_id) VALUES ('$user_id', '$book_id')";
    if(mysqli_query($conn, $addcart_query)) 
    {
        $_SESSION['addcart_sts'] = "Item: ".$book_title." has been successfully added to the cart!";
        $_SESSION['sts_code'] = "success";
    }
    else
    {
        $_SESSION['addcart_sts'] = "Server internal error! ";
        $_SESSION['sts_code'] = "error";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $row_book_info['b_title']; ?> </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="css/styles.css" rel="stylesheet">
 
    <style>
        pre {
            overflow-x: auto;
            white-space: pre-wrap;
        }
        .current-book-image {
            margin: 20px auto 10px;
            height: 400px;
        }
        .btn-addcart {
            display: block;
            width: 50%;
            margin: 20px auto;
        }
    </style>
    
</head>
<body>
    <?php
    include("masterpage/navbar.php");
    ?>

    <div id="books" class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <img src="<?php echo $row_book_info['b_img_link']; ?>" 
                alt="" class="center-block current-book-image">
                <form method="post">
                    <?php
                        $check_if_item_added_query = "SELECT * FROM cart WHERE book_id='$book_id' AND user_id='".$_SESSION['user_id']."' ";
                        $check_if_item_added_query_result = mysqli_query($conn, $check_if_item_added_query);

                        if(mysqli_num_rows($check_if_item_added_query_result) > 0) {
                            echo "<button type='submit' name='add-to-cart' class='btn btn-lg btn-danger btn-addcart' disabled> ITEM ADDED TO CART </button>";
                        }
                        else {
                            echo "<button type='submit' name='add-to-cart' class='btn btn-lg btn-danger btn-addcart'> ADD TO CART </button>";
                        }
                    ?>
                </form>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6">
                <h2> <?php echo $row_book_info['b_title']; ?></h2>

                <pre>AUTHOR                <?php echo $row_book_info['b_author']; ?> </pre>

                <pre>PUBLISHER             <?php echo $row_book_info['b_publisher']; ?> </pre> 
                
                <pre>PUBLISHED DATE        <?php echo $row_book_info['b_publish_date']; ?> </pre>

                <pre>CATEGORY              <?php echo $row_book_info['b_category']; ?> </pre> 

                <pre>PAGES                 <?php echo $row_book_info['b_page']; ?> </pre> 

                <pre>PRICE                 RM <?php echo $row_book_info['b_price']; ?> </pre>

                <pre>DESCRIPTION <br>   <p><?php echo $row_book_info['b_description']; ?> </p></pre>
                
            </div>
        </div>
    </div>

    <div class="container-fluid">
    <?php
            $view_preference_product_query = "SELECT b_id, b_title, b_img_link FROM book WHERE b_category='Fiction' ";
            $view_preference_product_query_result = mysqli_query($conn, $view_preference_product_query);

            //Initialize item value and counter value
            $item = 0;
            $i = 0;

            //Display title
            echo 
            "<div class='row'>
                <h3 class='home-title'>Similar Books</h3>
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
                if($i == 4) { break; }
            }

            if($i % 4 != 0) { echo "</div>"; }
        ?>

        <?php
            $view_preference_product_query = "SELECT b_id, b_title, b_img_link FROM book WHERE b_category='Art' ";
            $view_preference_product_query_result = mysqli_query($conn, $view_preference_product_query);

            //Initialize item value and counter value
            $item = 0;
            $i = 0;

            //Display title
            echo 
            "<div class='row'>
                <h3 class='home-title'>Similar Users Also Like</h3>
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
                if($i == 4) { break; }
            }

            if($i % 4 != 0) { echo "</div>"; }
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

    <?php 
        if (isset($_SESSION['addcart_sts']) && $_SESSION['addcart_sts'] != "") 
        {
            ?>
            <script>
                swal({
                        title: "<?php echo $_SESSION['addcart_sts']; ?>",
                        icon: "<?php echo $_SESSION['sts_code']; ?>",
                        button: "Ok"
                });
            </script>
            <?php
                unset($_SESSION['addcart_sts']);
        }    
    ?>

</body>
</html>	