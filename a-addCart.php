<?php

include 'add/conte.php';
session_start();

if(isset($_SESSION['admin_id'])){
    $admin_id = $_SESSION['admin_id'];
}else{
    $admin_id = '';
}
if(isset($_POST['cansle'])) {
    $changed = $_POST['cansle'];
    $changed = filter_var($changed, FILTER_SANITIZE_STRING);
    $chOrderId = $_POST['idOrder'];
    $chOrderId =   filter_var($chOrderId, FILTER_SANITIZE_STRING);

    $changedOrder = $db->prepare('SELECT * FROM `orders` WHERE order_id = ?');
    $changedOrder->execute([$chOrderId]);
    if($changedOrder->rowCount() > 0) {
        $changedOrder = $db->prepare("UPDATE `orders` SET `situation`= ? WHERE  order_id = ?");
        $changedOrder->execute([$changed, $chOrderId]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addToCart</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/foodnew.css">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/asida.css">
    <style>
        .orderidceit {
            color: var(--main-color);
        }
        .methodOrders {
            display: flex;
            padding: 30px;
            font-size: 20px;
            font-weight: bold;
            background-color: #eeeeee59;
            margin: 20px;
        }
        .methodOrders div{
            margin: 0 10px;
        }
        .addCartToOrder {
            width: 100%;
            display: flex;
            text-align: center;
            background-color: #eee;
            color: var(--main-color);
            padding: 20px;
            margin-bottom: 100px;
        }
        .addCartToOrder li{
            margin: auto;
        }
        .totalForAllhead {
            width: 67%;
            display: flex;
            background-color: #eee;
            padding: 20px;
            margin: 20px auto 0;
        }
        .totalForAllhead li {
            margin: auto;
        }
        .totalForAll {
            width: 67%;
            display: flex;
            background-color: #eee;
            padding: 20px;
            color: var(--main-color);
            margin: 0px auto;
        }
        .totalForAll li {
            margin: auto;
            border: 1px solid #b0b8ff5e;
            padding: 10px;
            width: 150px;
        }
        .cansleOrder {
            background-color: var(--main-color);
            color: #fff;
            font-size: 20px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            padding-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Start nav  -->
    <?php include "add/admin_nav.php"; ?>
    <!-- End nav  -->
    <!-- Start Oerders -->
    <div class="oerder">
    <h2 style='margin:50px auto 20px' class="main-title">Orders</h2>
        <div class="container">
            <?php if($_POST['order_sumbet'])
                    $orderId = $_POST['order_id'];
                    $select_order = $db->prepare("SELECT * FROM `orders` WHERE order_id = ?");
                  $select_order->execute([$orderId]);
                  if($select_order->rowCount() > 0) {
                      $rew_order =  $select_order->fetch(PDO::FETCH_ASSOC)?>
                      <?php if(isset($_POST['cansle'])) {
                        $changed = $_POST['cansle'];
                        $changed = filter_var($changed, FILTER_SANITIZE_STRING);
                        $chOrderId = $_POST['idOrder'];
                        $chOrderId =   filter_var($chOrderId, FILTER_SANITIZE_STRING);

                        $changedOrder = $db->prepare('SELECT * FROM `orders` WHERE order_id = ?');
                        $changedOrder->execute([$chOrderId]);
                        if($changedOrder->rowCount() > 0) {
                            $changedOrder = $db->prepare("UPDATE `orders` SET `situation`= ? WHERE  order_id = ?");
                            $changedOrder->execute([$changed, $chOrderId]);
                            header('location:a-orders.php');
                        } else {

                        }
                    }?>
                      <div>
                         <div class='methodOrders'>The Get Orders 
                                <div class="orderidceit"><?php echo '#'.$rew_order["order_id"]?></div> In 
                                <div class="orderidceit"><?php echo $rew_order["date"]?></div>and he is 
                                <div class="orderidceit"><?php echo $rew_order['situation']?></div>
                                <?php if($rew_order['situation'] == 'cansle') { } else if ($rew_order['situation'] == 'Incomplete') { } else {?>
                                <form action="" method='post'>
                                <input class='cansleOrder' type="submit" name='cansle' value='cansle'> 
                                <input class='cansleOrder' type="submit" name='cansle' value='Ok To Geting'> 
                                <input class='cansleOrder' type="submit" name='cansle' value='Incomplete'> 
                                <input type="hidden" name='idOrder' value='<?php echo $rew_order["order_id"]?>'>
                                </form><?php }?>
                            </div>
                            <div><?php $test_to_cart = $rew_order["order_id"]?></div>
                            <?php $select_To_cart = $db->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                                $select_To_cart->execute([$test_to_cart]);
                                if($select_To_cart->rowCount() > 0) {?>
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
                                            <?php  while ($rew_To_Cort =  $select_To_cart->fetch(PDO::FETCH_ASSOC)){?>
                                            <tr  style="text-align: center;">
                                                <td><?php echo $rew_To_Cort["price"]?>$</td>
                                                <td><?php echo $rew_To_Cort["quantity"]?></td>
                                                <td><?php echo $rew_To_Cort["name"]?></td>
                                                <td><?php echo $rew_To_Cort["pid"]?></td>
                                                <td><img style="width: 50px" src="img/<?php echo $rew_To_Cort["image"]?>.png" alt=""></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                    <?php }?>
                            <ul class='totalForAllhead'>
                                <li>address</li>
                                <li>total_products</li>
                                <li>total_price</li>
                                <li>payment_status</li>
                            </ul>
                            <ul class='totalForAll'>
                            <li><?php echo $rew_order["address"]?></li>
                                <li><?php echo $rew_order["total_products"]?></li>
                                <li><?php echo '#'.$rew_order["total_price"]?></li>
                                <li><?php echo $rew_order["payment_status"]?></li>
                            </ul>
                        </div>
                <?php }?>
        </div>
    </div>
    <!-- End Oerders  -->
    <!-- Start Footer  -->
    <?php //include "add/footer.php"; ?>
     <!-- Start Footer  -->

</body>
</html>
