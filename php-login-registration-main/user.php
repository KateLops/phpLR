<?php  
include ("db.php");
session_start();
$var_value = $_SESSION['user'];
if ($_SESSION['auth'] == "admin") {
    header('Location: admin.php');
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
    $query = "SELECT * FROM items WHERE name='Chainik'";
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);
    echo '<img src="'.$user['img'].'">'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="button.css">
    <title>Document</title>
</head>
<body>
    <div class="main2">
        <div>
    <p class="p">you are logged in as a <?php echo $var_value ?></p>
    </div>
    <div><img src="svinya-bul.gif"></div>
    <div><a class="pixel2" href="edituser.php">edit your profile</a></div>
    <div><a class="pixel2" href="index.php">log out</a></div>
    </div>
</body>
</html>