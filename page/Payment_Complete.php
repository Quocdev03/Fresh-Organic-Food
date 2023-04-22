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
            <h1 class="intro-heading">Welcome to Payment Complete</h1>
         </div>
      </div>
   </section>
   <section class="paymentComplete padding-section">
      <div class="container">
         <div class="paymentComplete-main">
            <div class="paymentComplete-noti">
               <i class="fa-solid fa-circle-check paymentComplete-icon"></i>
               <span class="paymentComplete-user">Hi Quoc, Congratulation!</span>
               <h1 class="paymentComplete-title">Payment Successful!</h1>
               <div class="paymentComplete-info">
                  <div class="paymentComplete-info__item">
                     <i class="fa-solid fa-mobile-screen-button"></i>
                     <span>0825218654</span>
                  </div>
                  <div class="paymentComplete-info__item">
                     <i class="fa-solid fa-envelope"></i>
                     <span class="ttc-unset">Quocdev03@gmail.com</span>
                  </div>
               </div>
               <div class="paymentComplete-more">
                  <div class="paymentComplete-more-item">
                     <h2>Payment Code:</h2>
                     <span>UIIUSN378645267</span>
                  </div>
                  <div class="paymentComplete-more-item">
                     <h2>Time:</h2>
                     <span>9999999</span>
                  </div>
                  <div class="paymentComplete-more-item">
                     <h2>Order Status:</h2>
                     <span class="paymentComplete-more-item__status not-confirm">
                        Chưa Xác Nhận!
                     </span>
                  </div>
                  <p class="paymentComplete-more-note not-confirm">
                     Đơn Hàng Của Bạn Vẫn Đang Trong Quá Trình Xác Nhận, Tải Lại Trang Nếu Tiến Trình Diển Ra Lâu.
                  </p>
               </div>
            </div>
            <div class="cart-payment">
               <div class="cart-payment-detail">
                  <div class="cart-payment-detail__header">
                     <div class="cart-payment-detail__title">
                        <h1>Detail Payment</h1>
                     </div>
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
                  <button name="Request_Info" type="submit" class="btn-primary">Download Bill</button>
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
            <img class="cartempty-image" srcset="Images/cart/cart-empty2x.png 2x" alt="">
            <h1 class="cartempty-title">Your Cart Is <span>Empty!</span></h1>
            <p class="cartempty-desc">Must add item on the cart before you process to check out!</p>
            <a class="btn-primary" href="index.php?url=product">Return to product</a>
         </div>
      </div>
   </section>
<?php
}
?>