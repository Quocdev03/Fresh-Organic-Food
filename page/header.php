<?php
// Get quantity in cart page
// start session
// kiểm tra xem session đã được khởi tạo chưa
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
// set cart total to 0
$cart_total = 0;
// check if cart session is set
if (isset($_SESSION['cart'])) {
   // loop through cart items to get total quantity
   if (count($_SESSION['cart']) > 0) {
      foreach ($_SESSION['cart'] as $product) {
         $cart_total += $product[4];
      }
   } else {
      return $cart_total;
   }
}
?>
<div class="header-container">
   <div class="header-logo">
      <a href="index.php?url=home">
         <img srcset="images/logo/header-logo.png 2x" alt="">
      </a>
   </div>
   <ul class="header-menu">
      <li class="header-menu-item">
         <a href="index.php?url=home" class="header-menu-item-link">Home</a>
      </li>
      <li class="header-menu-item">
         <a href="index.php?url=product" class="header-menu-item-link">Product</a>
      </li>
      <li class="header-menu-item">
         <a href="index.php?url=contact" class="header-menu-item-link">Contact</a>
      </li>
      <li class="header-menu-item">
         <a href="admin/index.php" class="header-menu-item-link">Test Admin</a>
      </li>
   </ul>
   <div class="header-auth">
      <a href="index.php?url=cart" class="header-cart-link">
         <img srcset="images/icon/cart.png 2x" alt="">
      </a>
      <span class="header-cart-link__quantity"> <?php echo $cart_total ?></span>
      <div class="header-button">
         <a href="#!" class="btn-outline">Sign Up</a>
         <a href="#!" class="btn-primary ">Login</a>
      </div>
   </div>
   <div class="menu-toggle">
      <i class="fa-solid fa-bars"></i>
   </div>
   <nav class="mb-nav">
      <div class="menu-close">
         <i class="fa-solid fa-xmark"></i>
      </div>
      <ul class="navigation">
         <li class="navigation-item">
            <a href="index.php?url=home" class="navigation-item-link">Home</a>
         </li>
         <li class="navigation-item">
            <a href="index.php?url=product" class="navigation-item-link">Product</a>
         </li>
         <li class="navigation-item">
            <a href="index.php?url=contact" class="navigation-item-link">Contact</a>
         </li>
         <li class="navigation-cart-item">
            <a href="index.php?url=cart" class="navigation-cart-link">
               <img srcset="images/icon/cart.png 2x" alt="">
               <span class="nav-cart-link__quantity"> <?php echo $cart_total ?></span>
            </a>
         </li>
         <li class="navigation-btn-signup-item">
            <a href="#!" class="btn-outline">SignUp</a>
         </li>
         <li class="navigation-btn-login-item">
            <a href="#!" class="btn-primary">Login</a>
         </li>
      </ul>
   </nav>
</div>