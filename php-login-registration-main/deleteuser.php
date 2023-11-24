<?php
include ("db.php");
session_start();
$id = $_SESSION['user'];
$query = "DELETE FROM users WHERE login='$id'"; 
mysqli_query($link, $query) or die(mysqli_error($link));
header('Location: index.php');
?>