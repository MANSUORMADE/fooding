<?php

include 'add/conte.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   header('location:home.php');
}else{
   $user_id = '';
};

$message = " ";
$messagn = " ";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = $_POST['password'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    
   $sin_in = $db->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $sin_in->execute([$email, $pass]);
   
   if ($_POST['email'] === "admin@gmail.com" && $_POST['password'] == "22446688") {
       $message = "Start admin";
       header('REFRESH:5;URL=admin_login.php');
    }
    if ($sin_in->rowCount() > 0 ) {
        $sin_in = $sin_in->fetch(PDO::FETCH_ASSOC);
      $_SESSION['user_id'] = $sin_in['id'];
      $message = "wolcam users successfully!";
      header('REFRESH:5;URL=home.php');
   } else {
      $messagn= "<div style='color:red;'>incorrect username or password!</div>";
   }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sun-in</title>
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

    <!-- End Articles -->
    <!-- Start Discount -->
    <div class="discount" id="discount">
        <div class="image">
            <div class="content">
                <h2>We Havr A Dicsount</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod rem totam sunt aut consectetur provident
                    reiciendis odio neque
                    , minima dolorem reprehenderit iste tenetur sapiente facilis earum error. Incidunt, quia nostrum!
                </p>
                <img src="img/user-icon.png" alt="">
            </div>
        </div>
        <div class="form">
            <div class="content test">
                <div style='color:green;'><?php echo $message; ?></div>
                <form action="" method="post">
                    <input class="input" type="email" required placeholder="Your Email" name="email">
                    <input class="input" type="password" required placeholder="Your password" name="password">
                    <input type="submit" value="send" name="submit">
                    <div><?php echo $messagn; ?></div>
                    <h2><a href="sun-up.php">sun-up</a></h2>
                </form>
            </div>
        </div>
    </div>
    <!-- End Discount -->

    <!-- Start Footer  -->
    <?php include "add/footer.php"; ?>
     <!-- Start Footer  -->

</body>
</html>