<?php

include 'add/conte.php';
session_start();

if(isset($_SESSION['admin_id'])){
    $admin_id = $_SESSION['admin_id'];
}else{
    $admin_id = '';
}
$messagerv = " ";
if(isset($_POST['addAdmin'])) {   
    $addadmin = $_POST['addadmin'];
    $addadmin = filter_var($addadmin, FILTER_SANITIZE_STRING); 
    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING); 

    $testadmin = $db->prepare("SELECT * FROM `adminss` WHERE id = ?");
    $testadmin->execute([$idadmin]);
    if($testadmin->rowCount() > 0) {
        $messagad = "<div style='color:red;text-align: center;'>This admin is faunt!</div>";
    } else {
        
        $testadmin = $db->prepare("INSERT INTO `adminss` (`id`, `name`, `password`, `date`) VALUES (NULL, ?, ?, NOW())");
        $testadmin->execute([$addadmin, $password]); 
        $messagad = "<div style='color:green;text-align: center;'>add new admin is successfully !</div>";

    }
}else {
    
}
if(isset($_POST['adminremov'])) {
    $nameadmin = $_POST['nameadmin'];
    $nameadmin = filter_var($nameadmin, FILTER_SANITIZE_STRING);
    $remov_admin = $db->prepare("SELECT * FROM `admins` WHERE name = ?");
    $remov_admin->execute([$nameadmin]);
    if ($remov_admin->rowCount() > 0 ) {      
        $remov_admin = $db->prepare("DELETE FROM `admins` WHERE name = ?");
        $remov_admin->execute([$nameadmin]); 
        $messagerv = "<div style='color:green;text-align: center;'>add Remove is successfully !</div>";
    } else {
    $messagerv = "<div style='color:red;text-align: center;'>This admin is not faunt!</div>";

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
    <!-- 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 -->
        <!-- Start table users -->
<div class="container">
    <table border="1" style=" width: 45%;margin: 20px auto ;">
        <thead>
            <?php  $add_admin = $db->prepare("SELECT * FROM `admins`"); $add_admin->execute();if($add_admin->rowCount() > 0){?>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>passowr</th>
                <th>Date</th>
            </tr>
            <?php while($add_admins = $add_admin->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <th><?php echo $add_admins['id'] ?></th>
                <th><?php echo $add_admins['name'] ?></th>
                <th><?php echo $add_admins['password'] ?></th>
                <th><?php echo $add_admins['date'] ?></th>

            </tr>
            <?php }?>
        </thead>
            <?php }else { echo '<h2 style"width:400px;" class="main-title">no users added yet!</h2>';}?>
        </table>
    </div>

    <!-- End table users -->
<!-- <form action=""></form> -->
    <div class="remov">
        <div class="container">
        <h2><?php echo $messagad ;?></h2>
            <form action="" method="post">
                <input class="input" type="text" required placeholder="add this admin" name="addadmin">
                 <input class="input" type="text" required placeholder="add password" name="password">
                <input type="submit" name="addAdmin" value="addAdmin">
            </form>
        </div>
    </div>
<!-- <form action=""></form> -->
<!-- <form action=""></form> -->
<div class="remov">
        <div class="container">
        <h2><?php echo $messagerv ;?></h2>
            <form action="" method="post">
                 <input class="input" type="text" required placeholder="add name remov" name="nameadmin">
                <input type="submit" name="adminremov" value="adminremov">
            </form>
        </div>
    </div>
<!-- <form action=""></form> -->


    <!-- Start Footer  -->
    <?php //include "add/footer.php"; ?>
     <!-- Start Footer  -->
</body>
</html>
<?php?>