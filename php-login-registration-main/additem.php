<?php  
include ("db.php");
session_start();
if ($_SESSION['auth'] == "user") { // проверка на пользователя
    header('Location: user.php');
}
else if($_SESSION['auth'] == "notauth") {
    header('Location: login.php');
}
else if($_SESSION['auth'] == "notauthI") {
    header('Location: index.php');
}
else if($_SESSION['auth'] == "notauthR") {
    header('Location: registration.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="input.css">
    <link rel="stylesheet" href="button.css">
    <title>Document</title>
</head>
<body>

<?php

if (!empty($_POST)) {
    $category = $_POST['category'];
	$name = $_POST['name'];
	$description = $_POST['description']; 
    $price = $_POST['price']; 

    $query = "SELECT * FROM items WHERE name='$name'";
	$user = mysqli_fetch_assoc(mysqli_query($link, $query));

    if (empty($user)) {
    $query = "INSERT INTO items SET category='$category', name='$name', description='$description', price='$price'";
    mysqli_query($link, $query) or die(mysqli_error($link)); 
    unset($_POST['name'], $_POST['category'], $_POST['description']);
    header('Location: admin.php');
    } 
    else {
        echo 'Логин уже занят';
    }
}
?>

<div class="main2">
<p>add user</p>
<form action="" method="POST">
<p class="text">Enter item category</p>
<input type="text" name="category" value="" placeholder="Enter item category"> <br>
<p class="text">Enter item name</p>
<input  type="text" name="name" value=""  placeholder="enter item name"> <br>
<p class="text">Enter description</p>
<input type="text" name="description" value=""  placeholder="Enter description"> <br>
<p class="text">set price</p>
<input type="text" name="price" value=""  placeholder="price"> <br>
<input type="submit" value="submit">
</form>    
</div>
</body>
</html>