<?php

include 'add/conte.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    header('location:home.php');
}else{
    $user_id = '';
};

// $id_users = 293374378;

$message = "sin your new";
$messagn = " ";
if(isset($_POST['sun_up'])){
    $id_users = rand(100000000, 110000000);
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $lastName = $_POST['lastName'];
    $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $address = $_POST['address'];
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $lastPassword = $_POST['lastPassword'];
    $lastPassword = filter_var($lastPassword, FILTER_SANITIZE_STRING);

    $sun_up = $db->prepare("SELECT * FROM `users` WHERE email = ?");
    $sun_up->execute([$email]);

if($sun_up->rowCount() > 0){
    $message = "<span style='color:red'>This Users is faent !</span>";
}else{
    $sun_in = $db->prepare("INSERT INTO `users` (`id`, `name`, `lastName`, `email`, `number`, `address`, `password`, `id_user`,`date`) VALUES(NULL,?,?,?,?,?,?,?,NOW())" );
    $sun_in->execute([$name, $lastName, $email, $number, $address, $password, $id_users]);
    $message = "<span style='color:green'>sent users successfully!</span>";             
    header('REFRESH:5;URL=sun-in.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sun-up</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/foodnew.css">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/asida.css">
    
</head>
<body>
    <!-- Start nav  -->
    <?php include "add/nav.php"; ?>
    <!-- End nav  -->

    <!-- Start aside  -->
    <?php include "add/aside.php"; ?>
    <!-- End aside  -->

    <!-- Start Discount -->
    <div class="discount" id="discount">
        <div class="image">
            <div class="content">
                <h2><div><?php echo $message; ?></div></h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod rem totam sunt aut consectetur provident
                    reiciendis odio neque
                    , minima dolorem reprehenderit iste tenetur sapiente facilis earum error. Incidunt, quia nostrum!
                </p>
                <img src="img/user-icon.png" alt="">
            </div>
        </div>
        <div class="form">
            <div class="content test">
                <div><?php echo $message; ?></div>
                <form action="" method="POST">
                    <input class="input" type="text" required placeholder="Your Name" name="name">
                    <input class="input" type="text" required placeholder="Your Last Name" name="lastName">
                    <input class="input" type="email" required placeholder="Your Email" name="email">
                    <input class="input" type="text" required placeholder="Your Phone" name="number"> 
                    <input class="input" type="text" required placeholder="Your address" name="address"> 
                    <input class="input" type="password" required placeholder="Your password" name="password">
                    <input class="input" type="password" required placeholder="Your Last password" name="lastPassword">
                    <input type="submit" value="send" name="sun_up">
                    <div><?php echo $messagn; ?></div>
                </form>
                <h2><a href="sun-in.php">sun-in</a></h2>
            </div>
        </div>
    </div>
    <!-- End Discount -->

    <!-- Start Footer  -->
    <?php include "add/footer.php"; ?>
     <!-- Start Footer  -->

</body>
</html>