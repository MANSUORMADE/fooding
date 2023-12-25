<?php

include 'add/conte.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/foodnew.css">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/asida.css">
    <style>
        .headOrder {
            display: flex;
            background-color: #eee;
            padding: 20px;
            color: var(--main-color);
            width: 100%;
        }
        .headOrder li{
            padding: 0 80px;
            font-size: 20px;
            font-weight: bold;
        }
        .bodyOreder {
            display: flex;
            color: #4fcb21;
            background-color: #eeeeee4d;
            padding: 20px;
            font-size: 20px;
            margin: 10px 0;
            border: 1px solid #eee;
            border-radius: 14px;
        }
        .bodyOreder li {
            padding: 10px;
            margin: 0px 50px;
        }
        .bodyOreder  .orderSumber {
            background-color: var(--main-color);
            padding: 5px;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            border: none;
            border-radius: 15px;
        }
        .bodyOreder .totaleli {
            width: 200px;
            margin: 0;
            text-align: center;
        }
        .bodyOreder .idoreder {
            width: 200px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <!-- Start nav  -->
    <?php include "add/nav.php"; ?>
    <!-- End nav  -->
    <!-- Start aside  -->
    <?php include "add/aside.php"; ?>
    <!-- End aside  -->
    <!--start Landing-->
    <div class="landing" id="landing">
        <div class="container">
            <div class="text">
                <h1>welcome, To Elzero world</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Id possimus culpa ducimus at molestiae, </p>
            </div>
            <div class="image">
                <img src="img/about-img.svg" alt="">
            </div>
            <a href="#aricles" class="go-down">
                <i class="fas fa-angle-double-down fa-2x"></i>
            </a>
        </div>
    </div>
    <!--End Landing-->
    <!-- Start Oerders -->
    <div class="oerder">
            <?php $select_order = $db->prepare("SELECT * FROM `orders` WHERE `user_id` = ? ORDER BY `id` DESC");
                  $select_order->execute([$user_id]);
                  if($select_order->rowCount() > 0) {?>
    <h2 class="main-title">Orders</h2>
        <div class="container">
                    <ul class="headOrder">
                        <li>idOrder</li>
                        <li>Date</li>
                        <li>Situation</li>
                        <li>totals</li>
                        <li>TheCart</li>
                    </ul>
                     <?php while ($rew_order =  $select_order->fetch(PDO::FETCH_ASSOC)){?>
                        <ul class="bodyOreder">
                            <li class='idoreder'><?php echo '# '.$rew_order["order_id"]?></li>
                            <li><?php echo $rew_order["date"]?></li>
                            <li><?php echo $rew_order["situation"]?></li>
                            <li class='totaleli'><?php echo 'tetale '.$rew_order["total_products"] . " $" . $rew_order["total_price"]?></li>
                            <li><form action="addCart.php" method='post'><input type="hidden" value="<?php echo $rew_order["order_id"]?>" name='order_id'><input class='orderSumber' name='order_sumbet' type="submit" value='lateMoer' ></form></li>
                        </ul>
                   <?php }?>
                
                <?php } else {  ?>
                    <h2 class="main-title">Not have Any Orders</h2>
                    <?php }?>
        </div>
    </div>
    <!-- End Oerders  -->
    <!-- Start Footer  -->
    <?php include "add/footer.php"; ?>
     <!-- Start Footer  -->
     <script>
        window.onload = function () {
        window.scrollTo({
            left: 10,
            top: 700,
            behavior:"smooth"
            })
        };
     </script>
</body>
</html>