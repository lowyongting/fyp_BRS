<?php
session_start();
unset($_SESSION['user']);
session_destroy();
header("Location: index.php?message=You have logged out successfully!");
?>
