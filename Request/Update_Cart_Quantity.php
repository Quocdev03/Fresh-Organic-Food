<?php
require_once 'Server/Session.php';

if (isset($_POST['productId']) && isset($_POST['quantity'])) {
   $productId = $_POST['productId'];
   $quantity = intval($_POST['quantity']); // chuyển đổi chuỗi thành số nguyên

   if (empty($productId) || empty($quantity)) {
      echo "Lỗi: Dữ liệu không đầy đủ";
   } else {
      // Tìm sản phẩm trong giỏ hàng và cập nhật số lượng sản phẩm
      foreach ($_SESSION['cart'] as &$product) {
         if ($product[0] == $productId) {
            // Cập nhật số lượng sản phẩm
            $product[4] = $quantity;
         }
      }
   }
} else {
   require 'Page/404.php';
}
