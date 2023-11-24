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
    $login = $_POST['login'];
	$pass = $_POST['pass'];
	$mail = $_POST['mail']; 
    $admin = $_POST['admin']; 

    $query = "SELECT * FROM users WHERE login='$login'";
	$user = mysqli_fetch_assoc(mysqli_query($link, $query));

    if (empty($user)) {
    $query = "INSERT INTO users SET login='$login', pass='$pass', mail='$mail', admin='$admin'";
    mysqli_query($link, $query) or die(mysqli_error($link)); 
    unset($_POST['login'], $_POST['pass'], $_POST['mail']);
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
<p class="text">Enter login</p>
<input type="text" name="login" value="" placeholder="Enter your login"> <br>
<p class="text">Enter password</p>
<input  type="text" name="pass" value=""  placeholder="enter password"> <br>
<p class="text">Enter mail</p>
<input type="text" name="mail" value=""  placeholder="Enter mail"> <br>
<p class="text">set admin</p>
<input type="text" name="admin" value=""  placeholder="1 - admin | 0 - user"> <br>
<input type="submit" value="submit">
</form>    
</div>
</body>
</html>