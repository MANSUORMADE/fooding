<?php

include 'connect.php';

session_start();
session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img style="margin: 300px 500px;width: 500px;" src="../img/loader.gif" alt="">
</body>
</html>

<?php  
header('REFRESH:5;URL=../sun-in.php');

?>