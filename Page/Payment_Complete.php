<?php
require_once 'Server/Connect.php';
require_once 'Server/Session.php';

$fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : '';

$TotalQuantity = isset($_SESSION['TotalQuantity']) ? $_SESSION['TotalQuantity'] : '';
$TotalPrice = isset($_SESSION['TotalPrice']) ? $_SESSION['TotalPrice'] : '';

$MaDH = isset($_SESSION['MaDH']) ? $_SESSION['MaDH'] : '';
$MaKH = isset($_SESSION['MaKH']) ? $_SESSION['MaKH'] : '';
$MaThanhToan = isset($_SESSION['MaThanhToan']) ? $_SESSION['MaThanhToan'] : '';
$TTrang = isset($_SESSION['TTrang']) ? $_SESSION['TTrang'] : '';
$TgLap = isset($_SESSION['TgLap']) ? $_SESSION['TgLap'] : '';

if (isset($_SESSION['payment_successful']) && $_SESSION['payment_successful'] === true) {
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
                     <span><?php echo $fullname ?>,</span>
                  </span>Congratulation!
               </h2>
               <h1 class="paymentComplete-title">Payment Successful!</h1>
               <div class="paymentComplete-info">
                  <div class="paymentComplete-info__item">
                     <i class="fa-solid fa-mobile-screen-button"></i>
                     <span>
                        <?php
                        $maskedPhone = substr($phone, 0, 6) . '****';
                        echo $maskedPhone;
                        ?>
                     </span>
                  </div>
                  <div class="paymentComplete-info__item">
                     <i class="fa-solid fa-envelope"></i>
                     <span class="ttc-unset"><?php echo $email ?></span>
                  </div>
               </div>
               <div class="paymentComplete-more">
                  <div class="paymentComplete-more-item">
                     <h2>Payment Code:</h2>
                     <span><?php echo $MaThanhToan ?></span>
                  </div>
                  <div class="paymentComplete-more-item">
                     <h2>Time:</h2>
                     <span><?php echo $TgLap ?></span>
                  </div>
                  <div class="paymentComplete-more-item">
                     <h2>Order Status:</h2>
                     <span class="paymentComplete-more-item__status not-confirm">
                        <?php
                        $sql = "SELECT TTrang FROM donhang WHERE MaDH = '$MaDH' AND MaKH = '$MaKH' AND MaThanhToan = '$MaThanhToan'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                           while ($row = mysqli_fetch_assoc($result)) {
                              echo $row["TTrang"];
                           }
                        }
                        ?>
                     </span>
                  </div>
                  <p class="paymentComplete-more-note not-confirm">
                     Đơn Hàng Của Bạn Vẫn Đang Trong Quá Trình Xác Nhận, Tải Lại Trang Nếu Tiến Trình Diển Ra Lâu.
                  </p>
               </div>
               <input type="hidden" name="MaDH" value="<?php echo $MaDH ?>">
               <input type="hidden" name="MaKH" value="<?php echo $MaKH ?>">
               <input type="hidden" name="MaThanhToan" value="<?php echo $MaThanhToan ?>">
               <button class="btn-outline paymentComplete-more__button" type="submit">Cancel Order</button>
            </div>
            <div class="cart-payment">
               <div class="cart-payment-detail">
                  <div class="cart-payment-detail__header">
                     <div class="cart-payment-detail__title">
                        <h1>Detail</h1>
                     </div>
                     <?php
                     foreach ($_SESSION['DetailProduct'] as $DetailProduct) {
                        echo '<div class="cart-payment-detail__sub">
                        <h1>' . $DetailProduct['productName'] . '</h1>
                        <span>' . number_format($DetailProduct['productPrice']) . '<sup>&#8363</sup></span>
                     </div>';
                     }
                     ?>
                  </div>
                  <div class="cart-payment-detail__total">
                     <?php
                     ?>
                     <h1 class="cart-payment-detail__total--title">Total</h1>
                     <div class="cart-payment-detail__total--list">
                        <div class="cart-payment-detail__total--item">
                           <h1>Product</h1>
                           <?php
                           if (isset($_SESSION['TotalQuantity'])) {
                              $TotalQuantity = $_SESSION['TotalQuantity'];
                              echo "<span>" . number_format($TotalQuantity) . "</span>";
                           }
                           ?>
                        </div>
                        <div class="cart-payment-detail__total--item">
                           <h1>Price</h1>
                           <?php
                           if (isset($_SESSION['TotalPrice'])) {
                              $TotalPrice = $_SESSION['TotalPrice'];
                              echo "<span>" . number_format($TotalPrice) . "<sup>&#8363</sup></span>";
                           }
                           ?>
                        </div>
                     </div>
                  </div>
               </div>
               <a href="index.php?url=Product" class="btn-primary">Return Product</a>
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