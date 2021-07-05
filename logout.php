<?php
session_start();
unset($_SESSION['user']);
session_destroy();
header("Location: login.php?message=You have logged out successfully!");
?>
