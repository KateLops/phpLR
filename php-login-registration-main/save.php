<?php
    include ("db.php");
	session_start();
	if($_SESSION['auth'] == "notauth") {
		header('Location: login.php');
	}
	else if($_SESSION['auth'] == "notauthI") {
		header('Location: index.php');
	}
	else if($_SESSION['auth'] == "notauthR") {
		header('Location: registration.php');
	}

	$id = $_GET['id'];
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	$mail = $_POST['mail'];
	$admin = $_POST['admin'];
	var_dump($_POST);

    $query = "UPDATE users SET
		login='$login', pass='$pass', mail='$mail', admin='$admin' WHERE id='$id'";

    mysqli_query($link, $query) or die(mysqli_error($link));
    header('Location: admin.php');
	?>