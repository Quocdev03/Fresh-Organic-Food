<?php
// kiểm tra xem session đã được khởi tạo chưa
session_start();
ob_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $productId = $_POST['productId'];
   $productQuantity = $_POST['productQuantity'];
   // update quantity for the product in the cart
   foreach ($_SESSION['cart'] as &$product) {
      if ($product[0] == $productId) {
         $product[4] = $productQuantity;
         break;
      }
   }
   // return the updated cart as JSON
   echo json_encode($_SESSION['cart']);
}
