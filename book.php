<?php
session_start();

include("db.php");

if(!isset($_SESSION['user'])) {
    header("Location:login.php?login=false");
}

if(isset($_SESSION['book_data_array'])) {
    $book_data_arr = $_SESSION['book_data_array'];
}

if(isset($_GET['id'])) 
{
    $book_id = $_GET['id'];
    foreach($book_data_arr as $book) 
    {
        if($book['id'] == $book_id)
        {
            $_SESSION['current_book'] = $book;
        }
    }
}

//If the add to cart button is clicked
if(isset($_POST['add-to-cart'])) {
    $book_title = $_SESSION['current_book']['volumeInfo']['title'];
    $book_author = $_SESSION['current_book']['volumeInfo']['authors'][0];
    $book_publisher = $_SESSION['current_book']['volumeInfo']['publisher'];
    $book_category = $_SESSION['current_book']['volumeInfo']['categories'][0];
    $book_img_link = $_SESSION['current_book']['volumeInfo']['imageLinks']['thumbnail'];

    // mysqli_real_escape_string() function escapes special characters in a string for use in an SQL query
    $b_title = mysqli_real_escape_string($conn, $book_title);
    $b_author = mysqli_real_escape_string($conn, $book_author);
    $b_publisher = mysqli_real_escape_string($conn, $book_publisher);
    $b_category = mysqli_real_escape_string($conn, $book_category);
    $b_price = mysqli_real_escape_string($conn, $_SESSION['book_price']);
    $b_img_link = mysqli_real_escape_string($conn, $book_img_link);

    $addcart_query = "INSERT INTO cart (user_id, book_id, book_title, book_author, book_publisher, book_category, book_price, book_img_link) VALUES ('".$_SESSION['user_id']."', '$book_id', '$b_title', '$b_author', '$b_publisher', '$b_category', '$b_price', '$b_img_link')";
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
    <title> <?php echo $_SESSION['current_book']['volumeInfo']['title']; ?> </title>
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
                <img src="<?php echo $_SESSION['current_book']['volumeInfo']['imageLinks']['thumbnail']; ?>" 
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
                <h2> <?php echo $_SESSION['current_book']['volumeInfo']['title']; ?></h2>

                <pre>AUTHOR                <?php 
                                                if(array_key_exists('authors',$_SESSION['current_book']['volumeInfo']))
                                                    echo $_SESSION['current_book']['volumeInfo']['authors'][0];
                                                else
                                                    echo "unknown";
                                            ?> </pre>

                <pre>PUBLISHER             <?php 
                                                if(array_key_exists('publisher',$_SESSION['current_book']['volumeInfo']))
                                                    echo $_SESSION['current_book']['volumeInfo']['publisher']; 
                                                else
                                                    echo "unknown";
                                            ?> </pre> 
                
                <pre>PUBLISHED DATE        <?php 
                                                if(array_key_exists('publishedDate',$_SESSION['current_book']['volumeInfo']))
                                                    echo $_SESSION['current_book']['volumeInfo']['publishedDate']; 
                                                else
                                                    echo "unknown";
                                            ?> </pre>

                <pre>CATEGORY              <?php 
                                                if(array_key_exists('categories',$_SESSION['current_book']['volumeInfo']))
                                                    echo $_SESSION['current_book']['volumeInfo']['categories'][0]; 
                                                else
                                                    echo "unknown";
                                            ?> </pre> 

                <pre>PAGES                 <?php 
                                                if(array_key_exists('pageCount',$_SESSION['current_book']['volumeInfo']))
                                                    echo $_SESSION['current_book']['volumeInfo']['pageCount']; 
                                                else
                                                    echo "unknown";
                                            ?> </pre> 

                <pre>PRICE                 <?php 
                                                if(array_key_exists('saleability',$_SESSION['current_book']['saleInfo'])) {

                                                    if($_SESSION['current_book']['saleInfo']['saleability'] == "FOR_SALE") {

                                                        if(array_key_exists('retailPrice',$_SESSION['current_book']['saleInfo'])) 
                                                        {
                                                            $_SESSION['book_price'] = $_SESSION['current_book']['saleInfo']['retailPrice']['currencyCode']." ".
                                                                                      $_SESSION['current_book']['saleInfo']['retailPrice']['amount'];    
                                                        }
                                                    }
                                                    else {
                                                        $_SESSION['book_price'] = "NOT FOR SALE";
                                                    }
                                                    echo $_SESSION['book_price'];
                                                }
                                                else {
                                                    $_SESSION['book_price'] = "unknown";
                                                    echo $_SESSION['book_price'];
                                                }
                                            ?> </pre>

                <pre>DESCRIPTION <br>   <p><?php 
                                                if(array_key_exists('description',$_SESSION['current_book']['volumeInfo']))
                                                    echo $_SESSION['current_book']['volumeInfo']['description']; 
                                                else
                                                    echo "unknown";
                                            ?> </p></pre>
                
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