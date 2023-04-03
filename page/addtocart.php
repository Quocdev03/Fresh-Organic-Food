<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
ob_start();
if (isset($_POST['productAdd']) && ($_POST['productAdd'])) {
   // Get value
   $productId = $_POST['productId'];
   $productName = $_POST['productName'];
   $productImage = $_POST['productImage'];
   $productPrice = $_POST['productPrice'];
   $productQuantity = 1;
   // Create array child
   $product = array($productId, $productName, $productImage, $productPrice, $productQuantity);

   // Check if product already exists in cart
   $productIndex = -1;
   foreach ($_SESSION['cart'] as $index => $item) {
      if ($item[0] == $productId && $item[1] == $productName && $item[2] == $productImage) {
         $productIndex = $index;
         break;
      }
   }

   // If product already exists in cart, increase quantity
   if ($productIndex > -1) {
      $_SESSION['cart'][$productIndex][4] += 1;
   } else {
      // Add product to cart
      if (!isset($_SESSION['cart'])) {
         $_SESSION['cart'] = array();
      }
      array_push($_SESSION['cart'], $product);
   }

   // Redirect user to cart page
   header('Location: index.php?url=cart');
}
