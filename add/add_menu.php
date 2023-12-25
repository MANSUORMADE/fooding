<div class="articles" id="articles">
        <?php  $products = $db->prepare("SELECT * FROM `products`");
                $products->execute(); 
                if($products->rowCount() > 0){?>
    <h2 class="main-title">Menu</h2>
    <div class="container">
                <?php while($rews = $products->fetch(PDO::FETCH_ASSOC)){ ?>
        <form action="" method="post" >
            <input type="hidden" name="cart_name" value="<?php echo $rews["name"]?>">
            <input type="hidden" name="cart_category" value="<?php echo $rews["category"]?>">
            <input type="hidden" name="cart_price" value="<?php echo $rews["price"]?>">
            <input type="hidden" name="cart_img" value="<?php echo $rews["image"]?>">
            <!-- <input type="hidddn "> -->
            <div class="box">
                <img src="img/<?php echo $rews["image"]?>.png" alt="">
                <div class="content">
                    <h3><?php echo $rews["name"]?></h3>
                    <p><?php echo $rews["category"]?></p>
                </div>
                <div class="info">
                    <!-- <a href="menu.php">R</a> -->
                    <input style="width:40px" type="number" name="cart_quantity" max="10" min="1" required>
                    <input type="submit" name="submit" value="Read More $<?php echo $rews["price"]?>" > 
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
                <div style="text-align: center;"><?php echo $rews["id"]?></div>
            </div>
        </form>
        <?php } }else { echo '<h2 style"width: 400px;" class="main-title">no products added yet!</h2>';}?>
    </div>
</div>







    