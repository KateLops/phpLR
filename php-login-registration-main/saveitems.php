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
	$name = $_POST['name'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$image = $_POST['image'];
	var_dump($_POST);

	$file_tmp = $_FILES['image']['tmp_name'];
	$image = 'Images/'.$_FILES['image']['name'];
	$image2 = 'Images/'.$_FILES['image']['name'];
	move_uploaded_file($file_tmp, $image2);
    $query = "UPDATE items SET
		name='$name', category='$category', description='$description', price='$price', img='$image' WHERE id='$id'";

    mysqli_query($link, $query) or die(mysqli_error($link));
    header('Location: admin.php');
	?>