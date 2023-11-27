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
    <?php
    $query = 'SELECT * FROM items';
    $result = mysqli_query($link, $query);
    echo'<div class="col1">';
    while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="box">';
    echo '<br>'.$row['category'].'<br>';
    echo 'id:'.$row['id'].'<br>';
    echo '<p> name: '.$row['name'].'</p>';
    echo '<p> description: '.$row['description'].'</p>'; 
    echo '<img src="'.$row['img'].'" >'.'';    
    echo '<p> price: '.$row['price'].'$ </p>';    
    echo '</div>';
}
echo'</div>';
?>
    <div><a class="pixel2" href="edituser.php">edit your profile</a></div>
    <div><a class="pixel2" href="index.php">log out</a></div>
    </div>
</body>
</html>