<?php
session_start();
ob_start();

// Xoá toàn bộ sản phẩm
if (isset($_GET['removeAllCart'])) unset($_SESSION['cart']);
header('location: index.php?url=product');

// Xoá từng sản phẩm
if (isset($_GET['removeItemCart'])) {
   // lặp lại các sản phẩm trong giỏ hàng để xoá sản phẩm tương ứng
   foreach ($_SESSION['cart'] as $key => $product) {
      if ($product[0] == $_GET['removeItemCart']) {
         unset($_SESSION['cart'][$key]); // xoá sản phẩm
      }
   }
   // kiểm tra số sản phẩm trong giỏ hàng
   if (count($_SESSION['cart']) > 0) {
      // ở lại trang hiện tại
      header("Location: {$_SERVER['HTTP_REFERER']}");
   } else {
      // chuyển hướng đến trang sản phẩm
      header('location: index.php?url=product');
   }
}
