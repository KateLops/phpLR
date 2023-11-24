<?php  
include ("db.php");
session_start();
$_SESSION['auth'] = "notauth";
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
    <title>login</title>
</head>
<body>
    <div class="main2">
    <img class="img" src="pastel_sky___pixel_art_by_alleenaspixels_dfuo1ih-375w-2x.png" alt="">
<div>
<form action="" method="POST" class="text">
    <p class="text">Enter your login</p>
    <input name="login" value="" type="text">
    <p class="text">Enter your password</p>
    <input name="pass" value="" type="password">
    <input type="submit" class="amogus" value="submit">
</form>    


</div>
<?php
if (!empty($_POST['pass']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    
    $query = "SELECT * FROM users WHERE login='$login' AND pass='$pass'";
    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res);
    if (!empty($user)) {
        // прошел авторизацию
        if($user["admin"] == 0)
        {
            $_SESSION['auth'] = "user";
            $_SESSION['user'] = $login;;
            header('Location: user.php');
            
        }
        else
        {
            $_SESSION['auth'] = "admin";
            $_SESSION['user'] = $login;
            header('Location: admin.php');
        }
        
    } else {
        // неверно ввел логин или пароль
        echo "  <div>
                <p>login or password is not correct</p>
                </div>";
    }
}
else
{
    echo "  <div>
                <p>please, enter login and password first</p>
            </div>";
}
?>
</div>
</body>
</html>