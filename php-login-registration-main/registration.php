<?php  
include ("db.php");
session_start();
$_SESSION['auth'] = "notauthR";
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

    $query = "SELECT * FROM users WHERE login='$login'";
	$user = mysqli_fetch_assoc(mysqli_query($link, $query));

    if (empty($user)) {
    $query = "INSERT INTO users SET login='$login', pass='$pass', mail='$mail', admin='0'";
    mysqli_query($link, $query) or die(mysqli_error($link)); 
    unset($_POST['login'], $_POST['pass'], $_POST['mail']);
    $_SESSION['auth'] = "user";
    $_SESSION['user'] = $login;
    header('Location: user.php');
    } 
    else {
        echo 'Логин уже занят';
    }
}
?>

<div class="main2">
<p>Registration</p>
<form action="" method="POST">
<p class="text">Enter your login</p>
<input type="text" name="login" value="" placeholder="Enter your login"> <br>
<p class="text">Enter your password</p>
<input  type="text" name="pass" value=""  placeholder="password"> <br>
<p class="text">Enter your mail</p>
<input type="text" name="mail" value=""  placeholder="Enter your mail"> <br>
<input type="submit" value="submit">
</form>    
</div>
</body>
</html>