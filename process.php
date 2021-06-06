<?php
session_start();

// To receive JSON string we can use the “php://input” along with the function file_get_contents() 
// which helps us receive JSON data as a file and reads it into a string.
$book_json_data = file_get_contents('php://input');
$book_data_object = json_decode($book_json_data, true);
var_dump($book_data_object);
$_SESSION['book_data_array'] = $book_data_object;

?>