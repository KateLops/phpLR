<?php 
 $host ='localhost';
 $user = 'root';
 $pass = '';
 $db = 'users';

 $link = mysqli_connect($host, $user, $pass, $db);
 if (!$link)
 {
    die('Ошибка соединения'. mysqli_connect_error());
 }
 else {
 
 }

//  mysqli_close($link);
?>