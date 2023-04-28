<?php
require_once 'Server/Session.php';
$cart_total = 0;
if (isset($_SESSION['cart'])) {
   if (count($_SESSION['cart']) > 0) {
      foreach ($_SESSION['cart'] as $product) {
         $cart_total += $product[4];
      }
   } else {
      $cart_total = 0;
   }
}
?>
<div class="header-container">
   <div class="header-logo">
      <a href="index.php?url=Home">
         <img srcset="Images/logo/header-logo.png 2x" alt="">
      </a>
   </div>
   <ul class="header-menu">
      <li class="header-menu-item">
         <a href="index.php?url=Home" class="header-menu-item-link">Home</a>
      </li>
      <li class="header-menu-item">
         <a href="index.php?url=Product" class="header-menu-item-link">Product</a>
      </li>
      <li class="header-menu-item">
         <a href="index.php?url=Contact" class="header-menu-item-link">Contact</a>
      </li>
      <li class="header-menu-item">
         <a href="index.php?url=Checkout" class="header-menu-item-link">Check Out</a>
      </li>
      <li class="header-menu-item">
         <a href="index.php?url=Payment_Complete" class="header-menu-item-link">Payment Detail</a>
      </li>
   </ul>
   <div class="header-auth">
      <a href="index.php?url=Cart" class="header-cart-link">
         <img srcset="Images/icon/cart.png 2x" alt="">
      </a>
      <span class="header-cart-link__quantity"> <?php echo $cart_total ?></span>
      <div class="header-button">
         <a href="index.php?url=Coming_Soon" class="btn-outline">Sign Up</a>
         <a href="index.php?url=Coming_Soon" class="btn-primary ">Login</a>
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
            <a href="index.php?url=Home" class="navigation-item-link">Home</a>
         </li>
         <li class="navigation-item">
            <a href="index.php?url=Product" class="navigation-item-link">Product</a>
         </li>
         <li class="navigation-item">
            <a href="index.php?url=Contact" class="navigation-item-link">Contact</a>
         </li>
         <li class="navigation-item">
            <a href="index.php?url=Checkout" class="navigation-item-link">Check Out</a>
         </li>
         <li class="navigation-item">
            <a href="index.php?url=Payment_Complete" class="navigation-item-link">Payment Detail</a>
         </li>
         <li class="navigation-cart-item">
            <a href="index.php?url=Cart" class="navigation-cart-link">
               <img srcset="Images/icon/cart.png 2x" alt="">
               <span class="nav-cart-link__quantity"> <?php echo $cart_total ?></span>
            </a>
         </li>
         <li class="navigation-btn-signup-item">
            <a href="index.php?url=Coming_Soon" class="btn-outline">SignUp</a>
         </li>
         <li class="navigation-btn-login-item">
            <a href="index.php?url=Coming_Soon" class="btn-primary">Login</a>
         </li>
      </ul>
   </nav>
</div>