<?php  
include ("db.php");
session_start();
$var_value = $_SESSION['user'];
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
    
    <link rel="stylesheet" href="button.css">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>
<a class="pixel2" href="index.php">log out</a>
<a class="pixel2" href="adduser.php">add user</a>
<div class="main2">
    <h1>you are logged in as a <?php echo $var_value ?></h1>
    
    <h2>all users:</h2>
<?php



$query = 'SELECT * FROM users';
$result = mysqli_query($link, $query);
echo'<div class="col1">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="box">';
    echo '<br>'.'user: '.$row['login'].'<br>';
    echo 'user id: '.$row['id'].'<br>';
    echo 'password: '.$row['pass'].'<br>';
    echo 'mail: '.$row['mail'].'<br>';   
    echo '<div >';
	   echo  '<a class="pixel2" href="edit.php?id='.$row['id'].'">edit</a> <a class="pixel2" href="delete.php?id='.$row['id'].'">delete</a></li>';
    echo '</div>';
    echo '</div>';
}
echo'</div>';
?>


</div>
</body>
</html>