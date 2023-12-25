<?php

include 'add/conte.php';
session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };


$message = "sin your Message";
 if(isset($_POST['message_send'])){
 
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $msg = $_POST['message'];
    $msg = filter_var($msg, FILTER_SANITIZE_STRING);
 
    $messages = $db->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
    $messages->execute([$name, $email, $number, $msg]);
 
    // $messagus = $db->prepare("SELECT * FROM `users` WHERE id = ? ");
    // $messagus->execute([$user_id]);

    if($messages->rowCount() > 0){
       $message = "<span style='color:red'>already sent message!</span>";
    }else  { 

        $usersi = $db->prepare("SELECT * FROM `users` WHERE id = ?"); 
        $usersi->execute([$user_id]);
        if($usersi->rowCount() > 0) {
        $messages_usersi = $db->prepare("INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`, `date`) VALUES (NULL,?,?,?,?,?,NOW())");
        $messages_usersi->execute([$user_id, $name, $email, $number, $msg]);
        $message = "<span style='color:green'>sent message successfully!</span>";
    } else {
        $messages_usersie = $db->prepare("INSERT INTO `messages2` (`id`, `user_id`, `name`, `email`, `number`, `message`,`date`) VALUES (NULL,?,?,?,?,?,NOW())");
        $messages_usersie->execute(['Unkone', $name, $email, $number, $msg]);
        $message = "<span style='color:green'>sent message successfully!</span>";
        }
    }
 
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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
        </div>
        <a href="#aricles" class="go-down">
            <i class="fas fa-angle-double-down fa-2x"></i>
        </a>
    </div>
    <!--End Landing-->

    <!-- Start Discount -->
    <div class="discount" id="discount">
        <div class="image">
            <div class="content">
                <h2>We Havr A Dicsount</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod rem totam sunt aut consectetur provident
                    reiciendis odio neque
                    , minima dolorem reprehenderit iste tenetur sapiente facilis earum error. Incidunt, quia nostrum!
                </p>
                <img src="img/contact-img.svg" alt="">
            </div>
        </div>
        <div class="form">
            <div class="content test">
                <div> <?php echo $message ;?></div>
                <form action="" method="post">
                    <input class="input" type="text" required placeholder="Your Name" name="name">
                    <input class="input" type="email" required placeholder="Your Email" name="email">
                    <input class="input" type="text" required placeholder="Your Phone" name="number">
                    <textarea class="input" required placeholder="tell Us About Your Needs" name="message"></textarea>
                    <input id='sun' type="submit" value="send" name="message_send">
                </form>
            </div>
        </div>
    </div>
    <!-- End Discount -->

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