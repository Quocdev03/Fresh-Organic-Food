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
            <h1 class="intro-heading">Welcome to Check Out</h1>
         </div>
      </div>
   </section>
   <section class="checkout padding-section">
      <div class="container">
         <div class="checkout-main">
            <div class="checkout-content">
               <h1 class="checkout-info-heading">Order Checkout</h1>
               <div class="checkout-bottom">
                  <div class="checkout-info">
                     <h1 class="checkout-info-title">Personal</h1>
                     <form action="#!" method="POST">
                        <div class="checkout-info-form">
                           <div class="checkout-form-group">
                              <label for="#!">Full Name</label>
                              <input required type="text" placeholder="Full Name">
                           </div>
                           <div class="checkout-form-group">
                              <label for="#!">Birthday</label>
                              <input required type="date" placeholder="Birthday">
                           </div>
                           <div class="checkout-form-group">
                              <label for="#!">Phone Number</label>
                              <input required type="tel" placeholder="Phone Number" pattern="[0-9]{10,11}" required>
                           </div>
                           <div class="checkout-form-group">
                              <label for="#!">Email</label>
                              <input required type="mail" placeholder="Email">
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="checkout-address">
                     <h1 class="checkout-info-title">Address</h1>
                     <form action="#!" method="POST">
                        <div class="checkout-address-form">
                           <label for="province">Tỉnh/Thành phố</label>
                           <select>
                              <option value="">Chọn Tỉnh/Thành phố</option>
                              <option value="01">Cần Thơ</option>
                              <option value="02">Hồ Chí Minh</option>
                              <option value="03">Cà Mau</option>
                           </select>
                        </div>
                     </form>
                  </div>
               </div>
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
                  <a href="index.php?url=checkout" class="btn-primary">Order Now</a>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php
} else {
?>
   <section class="cartempty padding-section">
      <div class="container">
         <div class="cartempty-main">
            <img class="cartempty-image" srcset="images/cart/cart-empty2x.png 2x" alt="">
            <h1 class="cartempty-title">Your Cart Is <span>Empty!</span></h1>
            <p class="cartempty-desc">Must add item on the cart before you process to check out!</p>
            <a class="btn-primary" href="index.php?url=product">Return to product</a>
         </div>
      </div>
   </section>
<?php
}
?>