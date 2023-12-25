<?php

include 'add/conte.php';
session_start();

if(isset($_SESSION['admin_id'])){
    $admin_id = $_SESSION['admin_id'];
}else{
    $admin_id = '';
}
$messagmiv = " ";

if(isset($_POST['mesremov'])) {
    $idmes = $_POST['idmes'];
    $idmes = filter_var($idmes, FILTER_SANITIZE_STRING);
    $remov_message= $db->prepare("SELECT * FROM `messages` WHERE id = ?");
    $remov_message->execute([$idmes]);
    if ($remov_message->rowCount() > 0 ) {      
        $remov_message = $db->prepare("DELETE FROM `messages` WHERE id = ?");
        $remov_message->execute([$idmes]); 
        $messagmrv = "<div style='color:green;text-align: center;'>add Remove is successfully !</div>";
    } else {
    $messagmrv = "<div style='color:red;text-align: center;'>This message is not faunt!</div>";

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
</head>
<body>
    <!-- Start nav  -->
    <?php include "add/admin_nav.php"; ?>
    <!-- End nav  -->

    <!-- Start table users -->
    <div class="container">       
        <!-- <form action=""></form> -->
        <div style="margin: 20px 40%;" class="container">
            <div class="container">
                <h2><?php echo $messagmrv ;?></h2>
                <form action="" method="post">
                    <input class="input" type="text" required placeholder="add id message remov" name="idmes">
                    <input type="submit" name="mesremov" value="mesremov">
                </form>
            </div>
        </div>
        <!-- <form action=""></form> -->
     
        <!-- Start table Message -->
        <table border="1" style=" width: 100% ;">
            <thead>
                <?php  $add_message = $db->prepare("SELECT * FROM `messages`"); $add_message->execute(); if($add_message->rowCount() > 0){ ?>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>  
                    <th>messages</th>  
                    <th>user_id</th>
                    <th>data</th>
                </tr>
                <?php while($add_messages = $add_message->fetch(PDO::FETCH_ASSOC)){ ?>
                <tr>
                    <th><?php echo $add_messages['id'] ?></th>
                    <th><?php echo $add_messages['name'] ?></th>
                    <th><?php echo $add_messages['email'] ?></th>
                    <th><?php echo $add_messages['number'] ?></th>   
                    <th><?php echo $add_messages['message'] ?></th>
                    <th><?php echo $add_messages['user_id'] ?></th>
                    <th><?php echo $add_messages['date'] ?></th>

                </tr>
                <?php } ?>
            </thead>
            <?php }else { echo '<h2 style"width:400px;" class="main-title">no add_messages added yet!</h2>';}?>
        </table>
    </div>
    <!-- End table Message -->


    <!-- Start Footer  -->
    <?php //include "add/footer.php"; ?>
     <!-- Start Footer  -->
</body>
</html>
<?php 
?>