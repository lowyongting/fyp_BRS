<?php 
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'fyp_brs'); 
define('DB_USER', 'root'); 
define('DB_PASSWORD',''); 

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error){
    die('Database error: ' . $conn->connect_error);
}
?>