<?php

include 'connect.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
};

$order_id = $_SESSION["order_id"];
$upDate = $db->prepare("UPDATE `cart` SET `user_id` = $order_id WHERE `user_id` = ?");
$upDate->execute([$user_id]);
echo '<img style="position: fixed;right: 900px;top: 400px;" style="margin: 300px 500px;width: 500px;" src="../img/loader.gif" alt="">';
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="position: fixed;left: 660px;top: 200px;padding: 40px;background-color: #eee;color: #2196f3;font-size: 20px;">wond to orders is be get the </div>
    <img style="position: fixed;right: 900px;top: 400px;" style="margin: 300px 500px;width: 500px;" src="../img/loader.gif" alt="">
</body>
</html>

<?php  
header('REFRESH:5;URL=../mein.php');

?>