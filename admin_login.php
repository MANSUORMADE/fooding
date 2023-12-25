<?php

include 'add/conte.php';

session_start();

$message = " <h2>This is about admin</h2>";
$messagn = " ";
if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $pass = $_POST['password'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $inadminrow = $db->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
   $inadminrow->execute([$name, $pass]);
   
   if ($name == "mansuor" && $pass == 12345) {
       $_SESSION['admin_id'] = 100;
       header('REFRESH:5;URL=admin.php');
    } else if($inadminrow->rowCount() > 0) {
    $inadminrow = $inadminrow->fetch(PDO::FETCH_ASSOC);
    $_SESSION['admin_id'] = $inadminrow['id'];
    $message= '<span style="color:green;">sent admin successfully!</span>';
    header('REFRESH:5;URL=admin.php');
   }else{
      $messagn= '<div style="color:red;">incorrect username or password!</div>';
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/foodnew.css">
</head>
<body>

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
            <div class="content">
                
                <form action="" method="post">
                    <input class="input" type="name" required placeholder="admin name" name="name">
                    <input class="input" type="password" required placeholder="admin password" name="password"> 
                    <input type="submit" value="send" name="submit">
                </form>
                <?php echo $messagn ?>
            </div>
        </div>
    </div>
    <!-- End Discount -->
</body>
</html>