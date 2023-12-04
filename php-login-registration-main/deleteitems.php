<?php
include ("db.php");
$id = $_GET['id'];
$query = "DELETE FROM items WHERE id='$id'"; 
mysqli_query($link, $query) or die(mysqli_error($link));
header('Location: admin.php');
?>