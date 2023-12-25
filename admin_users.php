<?php

include 'add/conte.php';
session_start();

if(isset($_SESSION['admin_id'])){
    $admin_id = $_SESSION['admin_id'];
}else{
    $admin_id = '';
}
$messaguiv = " ";

$messagmiv = " ";

if(isset($_POST['userremov'])) {
    $iduser = $_POST['iduser'];
    $iduser = filter_var($iduser, FILTER_SANITIZE_STRING);
    $remov_user = $db->prepare("SELECT * FROM `users` WHERE id = ?");
    $remov_user->execute([$iduser]);
    if ($remov_user->rowCount() > 0 ) {      
        $remov_user = $db->prepare("DELETE FROM `users` WHERE id = ?");
        $remov_user->execute([$iduser]); 
        $messagurv = "<div style='color:green;text-align: center;'>add Remove is successfully !</div>";
    } else {
    $messagurv = "<div style='color:red;text-align: center;'>This users is not faunt!</div>";

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/foodnew.css">
</head>
<body>
    <!-- Start nav  -->
    <?php include "add/admin_nav.php"; ?>
    <!-- End nav  -->

    <!-- Start table users -->
    <div class="container">
        
    <!-- <form action=""></form> -->
    <div style="margin: 20px 40%;" class="container">
                <h2><?php echo $messagurv ;?></h2>
                <form action="" method="post">
                    <input class="input" type="text" required placeholder="add id user remov" name="iduser">
                    <input type="submit" name="userremov" value="userremov">
                </form>
            </div>
    <!-- <form action=""></form> -->
    <table border="1" style=" width: 100%" >
        <thead>
            <?php  $add_user = $db->prepare("SELECT * FROM `users`"); $add_user->execute();if($add_user->rowCount() > 0){?>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>last</th>
                <th>Email</th>
                <th>Number</th>
                <th>adras</th>
                <th>password</th>
                <th>id_users</th>
                <th>data</th>
            </tr>
            <?php while($add_users = $add_user->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <th><?php echo $add_users['id'] ?></th>
                <th><?php echo $add_users['name'] ?></th>
                <th><?php echo $add_users['lastName'] ?></th>
                <th><?php echo $add_users['email'] ?></th>
                <th><?php echo $add_users['number'] ?></th>  
                <th><?php echo $add_users['address'] ?></th>  
                <th><?php echo $add_users['password'] ?></th>
                <th><?php echo $add_users['id_user'] ?></th>
                <th><?php echo $add_users['date'] ?></th>
            </tr>
            <?php }?>
        </thead>
        <tfoot>
            </tfoot>
            <?php }else { echo '<h2 style"width:400px;" class="main-title">no users added yet!</h2>';}?>
        </table>

    <!-- End table users -->

                
    </div>

    <!-- <form action=""></form> -->
    <!-- Start Footer  -->
    <?php //include "add/footer.php"; ?>
     <!-- Start Footer  -->
</body>
</html>
<?php 
?>