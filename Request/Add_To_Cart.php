<?php
require_once 'Server/Session.php';
if (isset($_POST['productAdd']) && ($_POST['productAdd'])) {

   $productId = $_POST['productId'];
   $productName = $_POST['productName'];
   $productImage = $_POST['productImage'];
   $productPrice = $_POST['productPrice'];
   $productQuantity = 1;

   $product = array($productId, $productName, $productImage, $productPrice, $productQuantity);

   $productIndex = -1;
   foreach ($_SESSION['cart'] as $index => $item) {
      if ($item[0] == $productId && $item[1] == $productName && $item[2] == $productImage) {
         $productIndex = $index;
         break;
      }
   }
   if ($productIndex > -1) {
      $_SESSION['cart'][$productIndex][4] += 1;
   } else {
      if (!isset($_SESSION['cart'])) {
         $_SESSION['cart'] = array();
      }
      array_push($_SESSION['cart'], $product);
   }
   header("Location: {$_SERVER['HTTP_REFERER']}");
}
