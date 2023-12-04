<?php
include ("db.php");
session_start();
if ($_SESSION['auth'] == "user") { 
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

$id = $_GET['id'];
$query = "SELECT * FROM items WHERE id=$id";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="input.css">
	<link rel="stylesheet" href="button.css">
	<title>edit</title>
</head>
<body>
<div class="main2">
	<p>enter new data</p>
	<div>
<form action="saveitems.php?id=<?= $_GET['id'] ?>" method="POST">
	<p>Login:</p>
	<input type="text" name="name" value="<?= $user['name'] ?>">
	<p>password:</p>
	<input type="text" name="category" value="<?= $user['category'] ?>">
	<p>email:</p>
	<input type="text" name="description" value="<?= $user['description'] ?>">
	<p>admin(0 - user 1 - admin):</p>
	<input type="text" name="price" value="<?= $user['price'] ?>">
	<input type="file" name="image" value="<?= $user['image'] ?>">
	<input type="submit" value="submit">
</form> 
</div>
</div>
</body>
</html>
