<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location:index.php?login=false");
}

if(isset($_SESSION['book_data_array'])) {
    $book_data_arr = $_SESSION['book_data_array'];
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
 
    <style>
        pre {
            overflow-x: auto;
            white-space: pre-wrap;
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
                <img src="<?php
                    if(isset($_GET['id'])) 
                    {
                        $book_id = $_GET['id'];
                        foreach($book_data_arr as $book) 
                        {
                            if($book['id'] == $book_id)
                            {
                                $_SESSION['current_book'] = $book;
                                echo $_SESSION['current_book']['volumeInfo']['imageLinks']['thumbnail'];
                            }
                            else
                                echo '';
                        }
                    }
                ?>" alt="" class="center-block" style="height:400px;margin:0 auto;">
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6">
                <h2> <?php echo $_SESSION['current_book']['volumeInfo']['title']; ?></h2>

                <pre>AUTHOR                <?php echo $_SESSION['current_book']['volumeInfo']['authors'][0]; ?> </pre>

                <pre>PUBLISHER             <?php echo $_SESSION['current_book']['volumeInfo']['publisher']; ?> </pre> 
                
                <pre>PUBLISHED DATE        <?php echo $_SESSION['current_book']['volumeInfo']['publishedDate']; ?> </pre>

                <pre>CATEGORY              <?php echo $_SESSION['current_book']['volumeInfo']['categories'][0]; ?> </pre> 

                <pre>PAGES                 <?php echo $_SESSION['current_book']['volumeInfo']['pageCount']; ?> </pre> 

                <pre>DESCRIPTION <br>   <p><?php echo $_SESSION['current_book']['volumeInfo']['description']; ?> </p></pre>
                
            </div>
        </div>
    </div>

    <!------------- Footer ------------>
    <footer style="margin-left:-6%;margin-right:-6%;">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-1 col-md-3 col-lg-3">
              </div>
              <div class="col-sm-7 col-md-6 col-lg-6">
                  <div class="row text-center">
                      <h2>Let's Get In Touch!</h2>
                      <hr class="primary">
                      <p>Give us a call or send us an email and we will get back to you as soon as possible!</p>
                  </div>
                  <div class="row">
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-earphone"></span>
                          <p>123-456-6789</p>
                      </div>
                      <div class="col-md-6 text-center">
                          <span class="glyphicon glyphicon-envelope"></span>
                          <p>BookStore@gmail.com</p>
                      </div>
                  </div>
              </div>
              <div class="hidden-sm-down col-md-3 col-lg-3">
              </div>
          </div>
      </div>
    </footer>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>	