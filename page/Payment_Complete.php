<?php
require_once 'Server/Connect.php';
require_once 'Server/Session.php';

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
               <h2 class="paymentComplete-user">Hi
                  <span>
                     <?php
                     $sql = "SELECT * FROM khachhang ORDER BY HoTen DESC LIMIT 1";
                     $result = $conn->query($sql);
                     if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                           echo '<span>' . $row['HoTen'] . '</span>';
                        }
                     }
                     ?>
                  </span>
                  , Congratulation!
               </h2>
               <h1 class="paymentComplete-title">Payment Successful!</h1>
               <div class="paymentComplete-info">
                  <div class="paymentComplete-info__item">
                     <i class="fa-solid fa-mobile-screen-button"></i>
                     <?php
                     $sql = "SELECT * FROM khachhang ORDER BY Sdt DESC LIMIT 1";
                     $result = $conn->query($sql);
                     if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                           $phone_number = $row['Sdt'];
                           $hidden_part = str_repeat("*", strlen($phone_number) - 4);
                           $visible_part = substr($phone_number, -4);
                           $hidden_phone_number = $hidden_part . $visible_part;
                           echo '<span>' .  $hidden_phone_number . '</span>';
                        }
                     }
                     ?>
                  </div>
                  <div class="paymentComplete-info__item">
                     <i class="fa-solid fa-envelope"></i>
                     <?php
                     $sql = "SELECT * FROM khachhang ORDER BY Email DESC LIMIT 1";
                     $result = $conn->query($sql);
                     if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                           echo '<span class="ttc-unset">' .  $row['Email'] . '</span>';
                        }
                     }
                     ?>
                  </div>
               </div>
               <div class="paymentComplete-more">
                  <div class="paymentComplete-more-item">
                     <h2>Payment Code:</h2>
                     <?php
                     $sql = "SELECT * FROM donhang ORDER BY MaThanhToan DESC LIMIT 1";
                     $result = $conn->query($sql);
                     if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                           echo '<span>' . $row['MaThanhToan'] . '</span>';
                        }
                     }
                     ?>
                  </div>
                  <div class="paymentComplete-more-item">
                     <h2>Time:</h2>
                     <?php
                     $sql = "SELECT * FROM donhang ORDER BY TgLap DESC LIMIT 1";
                     $result = $conn->query($sql);
                     if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                           echo '<span>' . $row['TgLap'] . '</span>';
                        }
                     }
                     ?>
                  </div>
                  <div class="paymentComplete-more-item">
                     <h2>Order Status:</h2>
                     <?php
                     $sql = "SELECT * FROM donhang ORDER BY TTrang DESC LIMIT 1";
                     $result = $conn->query($sql);
                     if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                           echo '<span class="paymentComplete-more-item__status not-confirm">' . $row['TTrang'] . '</span>';
                        }
                     }
                     ?>
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
            <h1 class="cartempty-title">Your Must To <span>Checkout!</span></h1>
            <p class="cartempty-desc">Must add item on the cart before you process to payment!</p>
            <a class="btn-primary" href="index.php?url=Product">Return to product</a>
         </div>
      </div>
   </section>
<?php
}
?>