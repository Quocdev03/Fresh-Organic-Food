<?php
require_once 'Server/Session.php';

// Xoá toàn bộ sản phẩm
if (isset($_GET['Remove_All_Cart'])) unset($_SESSION['cart']);
header('location: index.php?url=Product');

// Xoá từng sản phẩm
if (isset($_GET['Remove_Item_Cart'])) {
   foreach ($_SESSION['cart'] as $key => $product) {
      if ($product[0] == $_GET['Remove_Item_Cart']) {
         unset($_SESSION['cart'][$key]);
      }
   }
   if (count($_SESSION['cart']) > 0) {
      header("Location: {$_SERVER['HTTP_REFERER']}");
   } else {
      header('location: index.php?url=Product');
   }
}
