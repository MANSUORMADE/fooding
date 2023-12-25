<?php

include 'add/conte.php';
session_start();

if(isset($_SESSION['admin_id'])){
    $admin_id = $_SESSION['admin_id'];
}else{
    $admin_id = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders git</title>
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
            font-size: 15px;
            font-weight: bold;
            margin: 0px auto;
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
            margin: 0px auto;
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
            width: 80px;
        }
        .bodyOreder .idoreder {
            width: 80px;
        }  
        ul .nameOrder {
            width: 100px;
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Start nav  -->
    <?php include "add/admin_nav.php"; ?>
    <!-- End nav  -->

    <!-- Start Oerders -->
    <div class="oerder">
    <h2 style='margin-top:100px' class="main-title">Orders</h2>
        <div class="container">
            <?php $select_order = $db->prepare("SELECT * FROM `orders` ORDER BY `id` DESC");
                  $select_order->execute([]);
                  if($select_order->rowCount() > 0) {?>
                    <ul class="headOrder">
                        <li class='nameOrder'>Name</li>
                        <li>User_id</li>
                        <li>idOrder</li>
                        <li>Date</li>
                        <li>Situation</li>
                        <li>totals</li>
                        <li>TheCart</li>
                    </ul>
                     <?php while ($rew_order =  $select_order->fetch(PDO::FETCH_ASSOC)){?>
                        <ul class="bodyOreder">
                        <li class='nameOrder'><?php echo $rew_order["name"]?></li>
                        <li class='totaleli'><?php echo $rew_order["user_id"]?></li>
                            <li class=''><?php echo '# '.$rew_order["order_id"]?></li>
                            <li class='idoreder'><?php echo $rew_order["date"]?></li>
                            <li><?php echo $rew_order["situation"]?></li>
                            <li class='totaleli'><?php echo 'tetale '.$rew_order["total_products"] . " $" . $rew_order["total_price"]?></li>
                            <li><form action="a-addCart.php" method='post'><input type="hidden" value="<?php echo $rew_order["order_id"]?>" name='order_id'><input class='orderSumber' name='order_sumbet' type="submit" value='lateMoer' ></form></li>
                        </ul>
                   <?php }?>
                
                <?php }?>
        </div>
    </div>
    <!-- End Oerders  -->
    <!-- Start Footer  -->
    <?php //include "add/footer.php"; ?>
     <!-- Start Footer  -->
</body>
</html>