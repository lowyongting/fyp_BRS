<?php
session_start();
include("db.php");

// To receive JSON string we can use the “php://input” along with the function file_get_contents() 
// which helps us receive JSON data as a file and reads it into a string.
$book_json_data = file_get_contents('php://input');
$book_data_object = json_decode($book_json_data, true);
var_dump($book_data_object);
$_SESSION['book_data_array'] = $book_data_object;

foreach($book_data_object as $book) {

    if ($book['volumeInfo']['categories'][0] != "") {
        continue;
    }

    $book_id = $book['id'];
    $book_title = $book['volumeInfo']['title'];
    $book_published_date = $book['volumeInfo']['publishedDate'];
    $book_publisher = $book['volumeInfo']['publisher'];
    $book_page = $book['volumeInfo']['pageCount'];
    $book_isbn_13 = $book['volumeInfo']['industryIdentifiers'][0]['identifier'];
    $book_category = $book['volumeInfo']['categories'][0];
    $book_description = $book['volumeInfo']['description'];
    $book_author = $book['volumeInfo']['authors'][0];
    $book_price = $book['saleInfo']['retailPrice']['amount'];
    $book_img = $book['volumeInfo']['imageLinks']['thumbnail'];

    $b_id = mysqli_real_escape_string($conn, $book_id);
    $b_title = mysqli_real_escape_string($conn, $book_title);
    $b_date = mysqli_real_escape_string($conn, $book_published_date);
    $b_publisher = mysqli_real_escape_string($conn, $book_publisher);
    $b_page = mysqli_real_escape_string($conn, $book_page);
    $b_isbn = mysqli_real_escape_string($conn, $book_isbn_13);
    $b_cate = mysqli_real_escape_string($conn, $book_category);
    $b_des = mysqli_real_escape_string($conn, $book_description);
    $b_author = mysqli_real_escape_string($conn, $book_author);
    $b_price = mysqli_real_escape_string($conn, $book_price);
    $b_img = mysqli_real_escape_string($conn, $book_img);


    $crawlbook_query = "INSERT INTO book (b_id, b_title, b_publish_date, b_publisher, b_page, b_isbn_13, b_category, b_description, b_author, b_price, b_img_link) 
                        VALUES ('$b_id', '$b_title', '$b_date', '$b_publisher', '$b_page', '$b_isbn',  '$b_cate',  '$b_des',  '$b_author', '$b_price', '$b_img')";
    if(mysqli_query($conn, $crawlbook_query)) {

    }
}

?>