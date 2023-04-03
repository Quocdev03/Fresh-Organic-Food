<?php
// kiểm tra xem session đã được khởi tạo chưa
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
ob_start();
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
?>
   <section class="intro">
      <div class="container">
         <div class="intro-container">
            <h1 class="intro-heading">Welcome to Cart</h1>
         </div>
      </div>
   </section>
   <section class="cart padding-section">
      <div class="container">
         <div class="cart-container">
            <div class="cart-list">
               <?php
               foreach ($_SESSION['cart'] as $product) {
                  echo '<div class="cart-item">
               <div class="cart-item-image">
                  <img srcset="' . $product[2] . '" alt="">
               </div>
               <div class="cart-item-content">
                  <h1 class="cart-item-content__title">
                     ' . $product[1] . '
                  </h1>
                  <div class="card-item-content-prices">
                     <div class="cart-item-content__price">
                        <h2>
                           ' . number_format($product[3]) . '
                        </h2><sup>&#8363</sup>
                     </div>
                     <span class="cart-item-content__category">/kg</span>
                  </div>
                  <div class="cart-item-content__quantity">
                     <div class="cart-item-content__counter">
                        <button class="cart-item-content__counter--minus is-disable">-</button>
                        <h2 class="cart-item-content__counter--number">' . $product[4] . '</h2>
                        <button class="cart-item-content__counter--plus">+</button>
                     </div>
                     <a href="index.php?url=product" class="cart-item-content__more">See more
                        product</a>
                  </div>
               </div>
               <div class="cart-item-remove">
                  <a href="index.php?url=removetocart">
                  <img src="images/icon/close.svg" alt=""></a>
               </div>
               </div>';
               }
               ?>
               <a href="index.php?url=product" class="btn-primary">go product</a>
            </div>
            <div class="cart-payment">
               <div class="cart-payment-detail">
                  <div class="cart-payment-detail__header">
                     <div class="cart-payment-detail__title">
                        <h1>Price Detail</h1>
                     </div>

                     <?php
                     foreach ($_SESSION['cart'] as $product) {
                        $subtotal = $product[3] * $product[4];
                        echo ' <div class="cart-payment-detail__sub">
                        <h1 class="cart-payment-detail__sub--title">' . $product[1] . '</h1>
                        <span class="cart-payment-detail__sub--price">' . number_format($subtotal) . '<sup>&#8363</sup></span></div>';
                     }
                     ?>

                  </div>
                  <div class="cart-payment-detail__total">
                     <?php
                     ?>
                     <h1 class="cart-payment-detail__total--title">Total</h1>
                     <div class="cart-payment-detail__total--list">
                        <?php
                        $totalquantity = 0;
                        foreach ($_SESSION['cart'] as $product) {
                           $totalquantity = $totalquantity + $product[4];
                        }
                        ?>
                        <div class="cart-payment-detail__total--item">
                           <h1>Product</h1>
                           <span><?php echo number_format($totalquantity) ?></span>
                        </div>
                        <div class="cart-payment-detail__total--item">
                           <?php
                           $totalprice = 0;
                           foreach ($_SESSION['cart'] as $product) {
                              $subtotal = $product[3] * $product[4];
                              $totalprice += $subtotal;
                           }
                           ?>
                           <h1>Price</h1>
                           <span><?php echo number_format($totalprice) ?><sup>&#8363</sup></span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="cart-payment-checkout">
                  <a href="index.php?url=removetocart" class="btn-primary">Remove All</a>
                  <button type="submit" class="btn-primary">Checkout</button>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php
} else {
?>
   <section class="cartempty">
      <div class="container">
         <div class="cartempty-main">
            <h1> Ban chua co hang ?</h1>
            <a href="index.php?url=product">See more product</a>
         </div>
      </div>
   </section>
<?php
}
?>