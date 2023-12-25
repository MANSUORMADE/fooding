<!--START Header-->
<div class="header" id="header">
    <div class="container">
        <a href="admin.php" class="logo">Fooding</a>
        <ul class="main-nav">
            <li><a href="admin.php">home</a></li>
            <li><a href="admin_menu.php">add Menu</a></li>
            <li><a href="a-orders.php">look orders</a></li>
            <li><a href="admin_users.php">Users</a></li>
            <li><a href="admin_messages.php">Messages</a></li>
        </ul>
        <div>
            <?php
               $row_admin = $db->prepare("SELECT * FROM `admin` WHERE id = ?");
               $row_admin->execute([$admin_id]);
               if($row_admin->rowCount() > 0) {
                   $row_admin = $row_admin->fetch(PDO::FETCH_ASSOC);?>
            <div style='position: relative;'  id="profile"><?php  echo $row_admin['name'];?>
                <ul id="allName" style='display: none;position: absolute;background-color: #b5d5ff4d;'>
                    <li style="padding: 10px 10px 0;color: var(--main-color);"><?php echo  $row_admin['id'];?></li>
                    <li style="padding: 10px 10px 0;color: var(--main-color);"><a href="add/logout.php">logout</a></li>
                </ul>
                <?php } else if($_SESSION['admin_id'] === 100) {
                    echo '<div>bost admin</div>';
                   echo  '<li><a href="add-all.php">add all</a></li>';
                  echo '<li><a href="add/logout.php">logout</a></li>';
                }
                else { 
                   header('location:admin_login.php');
                } ?>
            </div>
        </div>
    </div>
</div>
<script>
    
// let names = document.getElementById("profile");
// let allName = document.getElementById("allName");
// names.onclick = function () {
//     allName.style.cssText = "display: block;z-index: 1;position: absolute;background-color: #b5d5ff4d;"
// }
</script>
<!--End Header-->