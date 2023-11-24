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
$query = "SELECT * FROM users WHERE id=$id";
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
<form action="save.php?id=<?= $_GET['id'] ?>" method="POST">
	<p>Login:</p>
	<input type="text" name="login" value="<?= $user['login'] ?>">
	<p>password:</p>
	<input type="text" name="pass" value="<?= $user['pass'] ?>">
	<p>email:</p>
	<input type="text" name="mail" value="<?= $user['mail'] ?>">
	<p>admin(0 - user 1 - admin):</p>
	<input type="text" name="admin" value="<?= $user['admin'] ?>">
	<input type="submit" value="submit">
</form> 
</div>
</div>
</body>
</html>


