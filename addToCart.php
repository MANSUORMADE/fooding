<?php

include 'add/conte.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
if(isset($_POST['addOrders'])){
    $order_id = rand(100000, 190000);
$userName = $_POST['userName'];
$userName = filter_var($userName, FILTER_SANITIZE_STRING);
$userEmail = $_POST['userEmail'];
$userEmail = filter_var($userEmail, FILTER_SANITIZE_STRING);
$userNumber = $_POST['userNumber'];
$userNumber = filter_var($userNumber, FILTER_SANITIZE_STRING);
$userAddress = $_POST['userAddress'];
$userAddress = filter_var($userAddress, FILTER_SANITIZE_STRING);
$totalProducts = $_POST['forall'];
$totalProducts = filter_var($totalProducts, FILTER_SANITIZE_STRING);
$totalPrice = $_POST['price'];
$totalPrice = filter_var($totalPrice, FILTER_SANITIZE_STRING);
$payment_status = $_POST['payment_status'];
$payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
$addToOrder = $db->prepare("INSERT INTO `orders3` (`id`, `order_id`, `user_id`, `name`, `email`, `number`, `address`, `total_products`, `total_price`, `payment_status`, `date`,`situation`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(),'waiting.....')");
$addToOrder->execute([$order_id, $user_id,$userName, $userEmail,$userNumber,$userAddress,$totalProducts,$totalPrice,$payment_status]);
$upDate = $db->prepare("UPDATE `cart` SET `user_id` = $order_id WHERE `user_id` = ?");
$upDate->execute([$user_id]);
echo '<img style="position: fixed;right: 900px;top: 400px;" style="margin: 300px 500px;width: 500px;" src="../img/loader.gif" alt="">';
        
header('REFRESH:5;URL=menu.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add To Cart</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/foodnew.css">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/asida.css">
    <style>
        form .container {
            background-color: #eee;
            color: var(--main-color);
            height: 848px;
            padding: 20px;
        }
        .formCart div {
                display: grid;
        }
        .formCart > div > input {
            padding: 10px;
            margin: 0 40px;
            border: 1px solid #eee;
            font-size: 20px;
            font-weight: bold;
            border-radius: 38px;
        }
        .formCart > div > label {
            width: 600px;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            margin: 0px 68px;
        } 
        .submitOrder {
            display: block;
            width: 50%;
            margin: 10px auto;
            padding: 15px;
            color: #fff;
            background-color: var(--main-color);
            border-radius: 10px;
            border: navajowhite;
            font-weight: bold;
            font-size: 20px;
            cursor: pointer;
        }
        
    </style>
</head>
<body>

    <!-- Start nav  -->
    <?php include "add/nav.php"; ?>
    <!-- End nav  -->
    <!-- Start Discount -->
    <?php $addToOrder = $db->prepare("SELECT * FROM `cart` WHERE user_id = ?");
              $addToOrder->execute([$user_id]);
              if($addToOrder->rowCount() > 0) {?>
            <form action="" method="POST">
            
            <div class="container">
                <div>
                <table border="1" style="margin: 0 auto;"width="500px" >
                    <thead>
                        <tr style="text-align: center;">
                            <td>pricr</td>
                            <td>quantity</td>
                            <td>Name</td>
                            <td>Describing</td>
                            <td>Species</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($rewAddToOrder = $addToOrder->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr  style="text-align: center;">
                            <td><?php echo $rewAddToOrder["price"]?>$</td>
                            <td><?php echo $rewAddToOrder["quantity"]?></td>
                            <td><?php echo $rewAddToOrder["name"]?></td>
                            <td><?php echo $rewAddToOrder["pid"]?></td>
                            <td><img style="width: 50px" src="img/<?php echo $rewAddToOrder["image"]?>.png" alt=""></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <tfoot style="text-align: center;">
                        <?php $getToCart = $db->prepare("SELECT SUM(price) as price, SUM(quantity) as forall FROM `cart` WHERE user_id = ?");
                        $getToCart->execute([$user_id]);
                        if($getToCart->rowCount() > 0) {
                        $rewGetToCart =  $getToCart->fetch(PDO::FETCH_ASSOC)
                            ?>
                        <tr>
                            <td><?php echo $rewGetToCart["price"]?>$</td>
                            <input type="hidden" value="<?php echo  $rewGetToCart["price"]?>" name="price">
                            <td><?php echo $rewGetToCart["forall"]?></td>
                            <input type="hidden" value="<?php echo $rewGetToCart["forall"]?>" name="forall">
                            <td></td>
                            <td></td>
                            <td>Total</td>
                        </tr>
                        <?php }?>
                    </tfoot>
                </table>
                <div class="formCart">   
                    <?php $userCart = $db->prepare("SELECT * FROM `users` WHERE id = ?"); 
                        $userCart->execute([$user_id]);
                        if($userCart->rowCount() > 0) { 
                        $rewUserCart = $userCart->fetch(PDO::FETCH_ASSOC);?>
                    <div>
                    <label for="name">your folle name</label>
                    <input id="name" type="text" max="20" value="<?php echo $rewUserCart['name'] ." " . $rewUserCart['lastName']?>" name="userName" required>
                    </div>
                    <div>
                    <label for="email">your Email </label>
                    <input id="email" type="email" min="10" max="50" value="<?php echo $rewUserCart['email']?>" name="userEmail" required>
                    </div>
                    <div>
                    <label for="number">your Number</label>
                    <input id="number" type="text" min="10"max="13" value="<?php echo $rewUserCart['number']?>" name="userNumber" required>
                    </div>
                    <div>
                    <label for="userAddress">Your Address And House Number and Street </label>
                    <textarea name="userAddress" id="text" cols="40" rows="5" required placeholder="Test Text"></textarea>
                    </div>
                    <div>
                    <label for="payment_status">wht your have bay</label>
                    <select name="payment_status" required id="book" multiple>
                        <optgroup label="payment_status">
                            <option value="binanes">binanes</option>
                            <option value="binkak">binkak</option>
                            <option value="pyypl">pyypl</option>
                            <option value="binkElslamai">binkElslamai</option>
                        </optgroup>
                    </select>
                    </div>
                    <input type="checkbox" required>
                    <label for="checkbox">whty</label>
                    <input class="submitOrder" type="submit" value="submit" name="addOrders">
                </div>
                </div>
            </div>
                <?php }?>
            </form>
            <?php } else {  header('location:menu.php');}?>
    <!-- End Discount -->

    <!-- Start Footer  -->
    <?php //nclude "add/footer.php"; ?>
     <!-- Start Footer  -->
     <!-- SELECT SUM(price) FROM `cart` WHERE user_id = 10 -->

</body>
</html>