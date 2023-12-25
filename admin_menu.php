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
// $admin = $admin->fetch(PDO::FETCH_ASSOC);pizza-1

// if($admin->rowCount() > 0) {

$message = " ";
$messagd = " ";
if(isset($_POST['add_menu'])) { 
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);  
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);  
    $category = $_POST['category'];
    $category = filter_var($category, FILTER_SANITIZE_STRING);  
    $pric = $_POST['pric'];
    $pric = filter_var($pric, FILTER_SANITIZE_STRING); 
    $img_add = $_POST['image'];
    $img_add = filter_var($img_add, FILTER_SANITIZE_STRING);  
    
    $add_menus = $db->prepare("SELECT * FROM `products` WHERE image = ?");
    $add_menus->execute([$img_add]);
    if ($add_menus->rowCount() > 0 ) {   
            $message = "<div style='color:red;text-align: center;'>This Menu is foant!</div>";
    } else { 
        $add_menu = $db->prepare("INSERT INTO `products2` (`id`, `name`, `category`, `price`, `image`) VALUES (?, ?, ?, ?, ?)");
        $add_menu->execute([$number,$name, $category, $pric, $img_add]);
        $message = "<div style='color:green;text-align:center; > wode !</div>";
        header('REFRESH:2;URL=admin_menu.php');
        $message = "<div style='color:green;text-align:center; > add Menu is successfully !</div>";
        
    }
}

if(isset($_POST['remov'])) {
    $idRv = $_POST['idRv'];
    $idRv = filter_var($idRv, FILTER_SANITIZE_STRING);
    $remov_menu = $db->prepare("SELECT * FROM `products` WHERE id = ?");
    $remov_menu->execute([$idRv]);
    if ($remov_menu->rowCount() > 0 ) {      
        $remov_menu = $db->prepare("DELETE FROM `products` WHERE id = ?");
        $remov_menu->execute([$idRv]); 
        $messagd = "<div style='color:green;text-align: center;'>add Remove is successfully !</div>";
    } else {
    $messagd = "<div style='color:red;text-align: center;'>This Menu is not faunt!</div>";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/food.css">
    <link rel="stylesheet" href="css/addmenu.css">
    <link rel="stylesheet" href="css/foodnew.css">
</head>
<body>
    <!-- Start nav  -->
    <?php include "add/admin_nav.php"; ?>
    <!-- End nav  -->

    <!-- Start menu -->
    <?php include "add/add_menu.php"; ?>
    <!-- End menu -->

<!-- <form action=""></form> -->
    <div class="add_menu">
        <div class="container">
            <h2><?php echo $message?></h2>
            <form action="" method="post">
                <input class="input" type="text" required placeholder="add number" name="number">
                <input class="input" type="text" required placeholder="add name" name="name">
                <input class="input" type="text" required placeholder="add category" name="category">
                <input class="input" type="text" required placeholder="add pric" name="pric">
                <input class="input" type="text" required placeholder="add imgs" name="image">
                <input type="submit" name="add_menu" value="add_menu">
            </form>
        </div>
    </div>
<!-- <form action=""></form> -->

    <ul class='stlyefood' style='display:flex'>
        <div class="container thsfood">
            <li>burger</li>
            <li>dessert</li>
            <li>dish</li>
            <li>drink</li>
            <li>pizza</li>
            <li>chekin</li>
        </div>
    </ul>
<!-- <form action=""></form> -->
    <div class="remov">
        <div class="container">
        <h2><?php echo $messagd?></h2>
            <form action="" method="post">
                 <input class="input" type="text" required placeholder="add id remov" name="idRv">
                <input type="submit" name="remov" value="remov">
            </form>
        </div>
    </div>
<!-- <form action=""></form> -->


    <!-- Start Footer  -->
    <?php //include "add/footer.php"; ?>
     <!-- Start Footer  -->
</body>
</html>
<?php
// } else {
//     echo "your not admin";
//     header('location:admin_login.php');
// }

?>