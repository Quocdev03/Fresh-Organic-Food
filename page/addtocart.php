<?php
session_start();
ob_start();
if (isset($_POST['productAdd']) && ($_POST['productAdd'])) {
   // Get value
   $productId = $_POST['productId'];
   $productName = $_POST['productName'];
   $productImage = $_POST['productImg'];
   $productPrice = $_POST['productPrice'];
   $productQuantity = 1;
   // Create array child
   $product = array($productId, $productName, $productImage, $productPrice, $productQuantity);
   // Add to cart
   // $_SESSION['cart'][] = $product;
   if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
   array_push($_SESSION['cart'], $product);
   header('Location: index.php?url=cart');
}
