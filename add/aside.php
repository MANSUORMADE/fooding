
<aside id="aside">
    <div class="asidesed">
        <span id="span" class="icon"><?php echo $cuont;?>
            <i style="cursor: pointer;" class="fas fa-laptop-code fa-4x"></i>
        </span>
        <div style="padding:10px" class="contant">
        <?php  $cart = $db->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $cart->execute([$user_id]); 
            if($cart->rowCount() > 0){?>
            <form action="addToCart.php" method="post">
                <!-- <div ><a style="color:#fff" href=""></a></div> -->
                <input style="cursor: pointer;position: absolute;bottom: 0;width: 100%;margin: 0 auto;background-color: var(--main-color);text-align: center;border-radius: 20px;padding: 10px;left: 0;"type="submit" value="submit">
            </form>
            <?php while($rewcart = $cart->fetch(PDO::FETCH_ASSOC)){ ?>
            <form style="padding: 15px;background-color: #fff;display: flex;margin: 0 0 10px;position: relative;" action="" method="post">
                <input style="cursor: pointer;margin: 0 6px 0 -14px;" type="submit" name="delet_cart" value="x">
                <div style="color: var(--main-color);"><?php echo $rewcart["quantity"];?></div>
                <p style="padding: 0px 10px;margin: 0;color: #cdcdcd;width: 65%;"><?php echo $rewcart["pid"];?></p>
                <div style="color: var(--main-color);"class="deletaside"><?php echo $rewcart["name"]?></div>
                <img style="width:50px;position: absolute;right: 0;top: 0px;" src="img/<?php echo $rewcart["image"];?>.png" alt="">
                <input style="" type="hidden" name="img_cart" value="<?php echo $rewcart["image"];?>">
            </form>
            <?php } }else {     ?>
                    <div style="color: var(--main-color);background-color: #fff;padding: 20px;font-size: 20px;font-weight: bold;margin: 100px 0;">You Don't Have Any Cart </div>
           <?php }?>
        </div>
    </div>
</aside>
<script>
    let spanon = document.getElementById("span");
    let aside = document.getElementById("aside");
    spanon.onclick = function () {
        aside.classList.toggle("asideon");
    }
    // window.onload = function () {
    //     // window.scrollY({
            
    //     })
    // }
    // document.quoy("body").scrollTo(100);
</script>
<!-- 
 -->

