<?php
session_start();
if (isset($_SESSION['cart'])) {
   echo var_dump($_SESSION['cart']);
   echo 'Ve trang san pham ? <a href="index.php?url=product">See more
   product</a>';
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
                  <img srcset="' . $_SESSION['cart'][2] . '" alt="">
               </div>
               <div class="cart-item-content">
                  <h1 class="cart-item-content__title">
                     ' . $_SESSION['cart'][1] . '
                  </h1>
                  <div class="card-item-content-prices">
                     <div class="cart-item-content__price">
                        <h2>
                           ' . $_SESSION['cart'][3] . '
                        </h2><sup>&#8363</sup>
                     </div>
                     <span class="cart-item-content__category">/kg</span>
                  </div>
                  <div class="cart-item-content__quantity">
                     <div class="cart-item-content__counter">
                        <button class="cart-item-content__counter--minus is-disable">-</button>
                        <h2 class="cart-item-content__counter--number">' . $_SESSION['cart'][4] . '</h2>
                        <button class="cart-item-content__counter--plus">+</button>
                     </div>
                     <a href="index.php?url=product" class="cart-item-content__more">See more
                        product</a>
                  </div>
               </div>
               <div class="cart-item-remove">
                  <a href="index.php?url=deltocart"><img src="images/icon/close.svg" alt=""></a>
               </div>
            </div>';
               }
               ?>
            </div>
            <div class="cart-payment">
               <div class="cart-payment-detail">
                  <div class="cart-payment-detail__header">
                     <div class="cart-payment-detail__title">
                        <h1>Price Detail</h1>
                     </div>

                     <?php
                     foreach ($_SESSION['cart'] as $product) {
                        // $totalprice = $_SESSION['cart'][4] + $_SESSION['cart'][3];
                        echo '<div class="cart-payment-detail__sub">
                        <h1 class="cart-payment-detail__sub--title">Subtotal Price</h1>
                        <span class="cart-payment-detail__sub--price">' . $_SESSION['cart'][3] . '<sup>&#8363</sup></span>
                     </div>';
                     }
                     ?>

                  </div>
                  <div class="cart-payment-detail__total">
                     <h1 class="cart-payment-detail__total--title">Total</h1>
                     <span class="cart-payment-detail__total--price">' . $totalprice . '<sup>&#8363</sup></span>
                  </div>
               </div>
               <div class="cart-payment-checkout">
                  <a href="index.php?url=deltocart" class="btn-primary">Remove All</a>
                  <button type="submit" class="btn-primary">Checkout</button>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php
} else {
   echo 'Ban chua co hang ? <a href="index.php?url=product">See more
   product</a>';
}
?>