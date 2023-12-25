<?php

include 'add/conte.php';
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}

include "add/add_cart.php";
if(isset($_POST["delet_cart"])) {

    $delet_cart = $_POST["img_cart"];
    $delet_cart = filter_var($delet_cart, FILTER_SANITIZE_STRING);
    // SELECT * FROM `cart` WHERE image = 'chekin';
    $add_delet_cart = $db->prepare("SELECT * FROM `cart` WHERE image = ?");
    $add_delet_cart->execute([$delet_cart]);

    if($add_delet_cart->rowCount() > 0) {
       // DELETE FROM `cart` WHERE image = 'drink-1'; 
       $add_delets_cart = $db->prepare("DELETE FROM `cart` WHERE image = ?");
       $add_delets_cart->execute([$delet_cart]);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/foodnew.css">
    <link rel="stylesheet" href="css/asida.css">
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
                <h1>welcome To fooding</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Id possimus culpa ducimus at molestiae, </p>
            </div>
            <div class="image">
                <img src="img/about-img.svg" alt="">
            </div>
        </div>
        <a href="#aricles" class="go-down">
            <i class="fas fa-angle-double-down fa-2x"></i>
        </a>
    </div>
    <!--End Landing-->

    <!-- Start menu -->
    <?php include "add/add_menu.php"; ?>
    <!-- End menu -->

    <!-- Start Footer  -->
    <?php include "add/footer.php"; ?>
     <!-- Start Footer  -->
     <script>
        window.onload = function () {
        window.scrollTo({
            left: 10,
            top: 1000,
            behavior:"smooth"
        })
    };
     </script>
</body>
</html>