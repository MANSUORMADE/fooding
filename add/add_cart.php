<?php
// $cuont = 0;
if(isset($_POST['submit'])){

if($user_id == ''){
   header('location:add/logout.php');
}else{

   $pid = $_POST['cart_category'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);

   $name = $_POST['cart_name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   $price = $_POST['cart_price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);

   $quantity = $_POST['cart_quantity'];
   $quantity = filter_var($quantity, FILTER_SANITIZE_STRING);

   $image = $_POST['cart_img'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $db->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
   //    // $message[] = 'already added to cart!';
   } else {
      $cuont++;
      $insert_cart = $db->prepare("INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
      $insert_cart->execute([$user_id, $pid, $name, $price * $quantity, $quantity, $image]);
   //    // $message[] = 'added to cart!';  
   }
}
}