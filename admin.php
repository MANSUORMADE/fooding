<?php

include 'add/conte.php';
session_start();

if(isset($_SESSION['admin_id'])){
    $admin_id = $_SESSION['admin_id'];
}else{
    $admin_id = '';
}

// $admin = $conn->prepare("SELECT * FROM `admin` WHERE admin_id = ?");
// $admin->execute([$admin_id]);
// $admin = $admin->fetch(PDO::FETCH_ASSOC);

// if($admin->rowCount() > 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/foodnew.css">
</head>
<body>
    <!-- Start nav  -->
    <?php include "add/admin_nav.php"; ?>
    <!-- End nav  -->

    <!-- Start Articles -->
    <div class="articles" id="articles">
        <h2 class="main-title">Articles</h2>
        <div class="container">
            <div class="box">
                <img src="img/burger-1.png" alt="">
                <div class="content">
                    <h3>Tburger</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/burger-2.png" alt="">
                <div class="content">
                    <h3>Tburger</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/dessert-1.png" alt="">
                <div class="content">
                    <h3>dessert</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/dessert-2.png" alt="">
                <div class="content">
                    <h3>dessert</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/dessert-3.png" alt="">
                <div class="content">
                    <h3>dessert</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/dessert-4.png" alt="">
                <div class="content">
                    <h3>dessert</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/dessert-5.png" alt="">
                <div class="content">
                    <h3>dessert</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/dessert-6.png" alt="">
                <div class="content">
                    <h3>dessert</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/dish-1.png" alt="">
                <div class="content">
                    <h3>dish</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/dish-2.png" alt="">
                <div class="content">
                    <h3>dish</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/dish-3.png" alt="">
                <div class="content">
                    <h3>dish</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/dish-4.png" alt="">
                <div class="content">
                    <h3>dish</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/drink-1.png" alt="">
                <div class="content">
                    <h3>drink</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/drink-2.png" alt="">
                <div class="content">
                    <h3>drink</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/drink-3.png" alt="">
                <div class="content">
                    <h3>drink</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/drink-4.png" alt="">
                <div class="content">
                    <h3>drink</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/drink-5.png" alt="">
                <div class="content">
                    <h3>drink</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/pizza-1.png" alt="">
                <div class="content">
                    <h3>drink</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/pizza-2.png" alt="">
                <div class="content">
                    <h3>drink</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/pizza-3.png" alt="">
                <div class="content">
                    <h3>drink</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/pizza-4.png" alt="">
                <div class="content">
                    <h3>drink</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <div class="box">
                <img src="img/pizza-5.png" alt="">
                <div class="content">
                    <h3>drink</h3>
                    <p>Lorem ipsum dolor sitatem </p>
                </div>
                <div class="info">
                    <a href="admin_menu.php">Read More</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
        </div>
    </div>
       <!-- End Articles -->

       <!-- Start Footer  -->
    <?php include "add/footer.php"; ?>
     <!-- Start Footer  -->

</body>
</html>
<?php 
// } else {
//     echo "your not admin";
//     header('location:admin_login.php');
// }

?>