<?php
session_start();
$temp_for;
$item;

include ("db.php");



if($_SESSION['cart'] == NULL)
{
    $_SESSION['cart'] = [];
}

if (isset($_GET['id']))
{
    unset($_SESSION['cart'][$_GET['cart_id'][0]]);
    unset($_GET['$id']);
    header("Location:cart.php");
}

unset($_GET['$id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<header>
    <a href="user.php"><p>Назад</p></a>
    <form action="../scripts/logout.php">
	    <input type="submit" value="logout" id="lgbtn" >
    </form>
</header>
<body>
    <div id="content_div">
    <?php echo "<p> Ваша корзина!";?>
    </div>
    <?php
    
    if ($_SESSION["cart"] != null)
    {
    $temp_for = 0;
    foreach ($_SESSION['cart'] as $item)
    {
        $query = "SELECT id,name,price,img FROM items WHERE id = $item";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            echo '<div id="content_div">'.
            '<p>'.$row['name'].'</p>'.
            '<p>'.$row['price'].'</p>'.
            '<img src="'.$row['img'].'" >'.''
            .
            '<form method="GET">
            <input type="hidden" name="id" value="'.$row["id"].'">
            <input type="hidden" name="cart_id" value="'.$temp_for.'">
            <input type="submit" name="but" value="Удалить" id="lgbtn">
            </form>'
            .'</div>'
            ;
        }
        $temp_for ++;
    }
}
?>

</body>
</html>

<?php
if (isset($_GET['id']))
{
    $tempS = $_SESSION['cart'];
    echo $temp_for;
    unset($tempS[$temp_for]);
    // unset($_GET['$id']);
    // header("Location:cart.php");
}
?>