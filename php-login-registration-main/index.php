<?php  
include ("db.php");
session_start();
$_SESSION['auth'] = "notauthI";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="button.css">
    
    <title>Document</title>
</head>
<body>
    <h1>Welcome</h1>
    <div class="main">
        <a class="pixel2" href="login.php">Login</a>
        <a class="pixel2" href="registration.php">Registration</a>
    </div>
    

    


</body>
</html>