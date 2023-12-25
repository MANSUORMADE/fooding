<!--START Header-->
<div class="header" id="header">
    <div class="container">
        <a href="home.php" class="logo">Fooding</a>
        <ul class="main-nav">
            <li><a href="home.php">home</a></li>
            <li><a href="menu.php">menu</a></li>
            <li><a href="orders.php">orders</a></li>
            <li><a href="#home.php">about</a></li>
            <li><a href="message.php">contact</a></li>
        </ul> 
        <?php $users = $db->prepare("SELECT * FROM `users` WHERE id = ?"); $users->execute([$user_id]);?>
        <div class="profile">
            <?php if($users->rowCount() > 0) { $users = $users->fetch(PDO::FETCH_ASSOC);?>
                <div style='position: relative;' id="name" class="name"><?php echo $users['name'];?>
                    <ul style='display: none;position: absolute;background-color: #b5d5ff4d;' id="allName" class="allName" style="">
                        <li style="padding: 10px 10px 0;color: var(--main-color);"><?php echo $users['number'];?></li>
                        <li  style="padding: 10px 10px 0;color: var(--main-color);"><?php echo $users['email'];?></li>
                        <li style="padding: 10px 10px 0;color: var(--main-color);"><?php echo $users['id_user'];?></li>
                        <li  style="padding: 10px 10px 0;color: var(--main-color);"><a href="add/logout.php">logout</a></li>
                        <li  style="padding: 10px 10px 0;color: var(--main-color);"><i class="fas fa-palette fa-4x"></i></li>  
                    </ul>
                </div>
            <?php } else { ?>
                <ul>
                    <div><a href="sun-in.php">Sign-in</a></div>
                    <div><a href="sun-up.php">Sign-up</a></div>
                </ul>
                <?php } ?>
            </div>
            <!-- <ul class="allcolor" >
                <li class="color1" id="color1"></li>
                <li class="color2" id="color2"></li>
                <li class="color3" id="color3"></li>
                <li class="color4" id="color4"></li>
                <li class="color5" id="color5"></li>
            </ul> -->
    </div>
</div>
<script>
    
// let names = document.getElementById("name");
// let allName = document.getElementById("allName");

// allName.style.cssText = "display: none";
// names.onclick = function () {
//     allName.style.cssText = "display: block;z-index: 1;position: absolute;background-color: #b5d5ff4d;"
// }
// names.onmouseleave = function () {
//     allName.style.cssText = "display: none;"
// }

</script>
<!--End Header-->