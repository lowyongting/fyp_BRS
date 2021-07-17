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

                <pre>AUTHOR                <span id="current_author"><?php echo $row_book_info['b_author']; ?></span> </pre>

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

        <!------------------- Start Generating Similar Books -------------------->
        <?php
            $get_similar_books_query = "SELECT * FROM book WHERE NOT b_category='".$row_book_info['b_category']."' ";
            $get_similar_books_query_result = mysqli_query($conn, $get_similar_books_query);

            //Initialize item value and counter value
            $item = 0;
            $i = 0;

            //Display title
            echo 
            "<div class='row'>
                <h3 class='home-title'>Similar Books</h3>
            </div>";

            //The explode() function breaks a string into an array.
            $author_substrings = explode(" ", $row_book_info['b_author']);

            while($similar_book_row = mysqli_fetch_array($get_similar_books_query_result)) {

                //The for loop intends to find if any substrings of the current book description contained in the current iteration of the book.
                foreach($author_substrings as $sub) {
                    //Get the length of the substring
                    $substring_length = strlen($sub);
                    if($substring_length<3) { continue; }
                    //stripos() executed to find out the position of the first occurrence of a string inside another string.
                    $position = stripos($similar_book_row['b_author'], $sub);

                    if(!$position) 
                    {
                        continue;
                    }
                    else 
                    {
                        //Start comparing if the current substring of the author exactly match the word found.
                        $compare_result = substr_compare($similar_book_row['b_author'], $sub, $position, $substring_length, TRUE);
                        if($compare_result != 0) 
                        {
                            continue;
                        }
                        else
                        {
                            if($item % 4 == 0) { echo "<div class='row text-center'>"; }
                            //increment the number of items
                            $item++;

                            //get necessary book data to be displayed
                            $book_id = $similar_book_row['b_id'];
                            $book_title = $similar_book_row['b_title'];
                            $book_img = $similar_book_row['b_img_link'];

                            //Display similar books
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
                    }
                }
            // End of while loop 
            }

            if($i % 4 != 0) { echo "</div>"; }
        ?>
        <!------------------- End of Generating Similar Books -------------------->

        <!------------------- Start generating books liked by similar users -------------------->
        <?php
            //Get current logged-in user's data
            $age = $_SESSION['user_age'];
            $gender = $_SESSION['user_gender'];
            $location = $_SESSION['user_location'];
            $prefer1 = $_SESSION['user_prefer_cate1'];
            $prefer2 = $_SESSION['user_prefer_cate2'];

            //Define age group of users
            $teenager = array("min"=>"10", "max"=>"19");
            $adult = array("min"=>"20", "max"=>"45");
            $middle_age = array("min"=>"46", "max"=>"60");
            $old_ppl = array("min"=>"60", "max"=>"100");
            $age_group = array(
                $teenager, $adult, $middle_age, $old_ppl
            );

            $locate_similar_users_query = "SELECT * FROM users JOIN cart ON id=cart.user_id JOIN book ON b_id=cart.book_id WHERE (users.gender='$gender' AND users.location='$location') AND NOT id='".$_SESSION['user_id']."' ";
            $locate_similar_users_query_result = mysqli_query($conn, $locate_similar_users_query);

            /*  If all of the criteria (gender and location) don't match with current logged-in user,
                then find out the users with either same gender or same location    */
            if(mysqli_num_rows($locate_similar_users_query_result) == 0) {
                $locate_similar_users_query = "SELECT * FROM users JOIN cart ON id=cart.user_id JOIN book ON b_id=cart.book_id WHERE (users.gender='$gender' OR users.location='$location') AND NOT id='".$_SESSION['user_id']."' ";
                $locate_similar_users_query_result = mysqli_query($conn, $locate_similar_users_query);
            }

            //Display title
            echo 
            "<div class='row'>
                <h3 class='home-title'>Similar Users Also Like</h3>
            </div>";

            if(mysqli_num_rows($locate_similar_users_query_result) == 0) 
            {
                echo "<p>No results found. </p>";
            }
            else 
            {
                //Initialize item value and counter value
                $item = 0;
                $i = 0;

                while($book_row = mysqli_fetch_array($locate_similar_users_query_result)) 
                {
                    //Check if the age group of similar users same with the current logged-in user
                    foreach($age_group as $ag) 
                    {
                        //Skip If not matching with current age group iteration
                        if(!($ag['min'] <= $book_row['age'] && $book_row['age'] <= $ag['max'])) 
                        {
                            continue;
                        }
                        //Display item liked by users if age group matched
                        else 
                        {
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
                    }
                // End of while loop
                }

                if($i % 4 != 0) { echo "</div>"; }
            }
            
        ?>
        <!------------------- End of generating books liked by similar users -------------------->

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