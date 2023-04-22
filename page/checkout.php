<?php
require_once 'Server/Session.php';
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
         <form action="index.php?url=Request_Order_Bill" method="POST">
            <div class="checkout-main">
               <div class="checkout-content">
                  <h1 class="checkout-info-heading">Order Checkout</h1>
                  <div class="checkout-bottom">
                     <div class="checkout-info">
                        <h1 class="checkout-info-title">Personal</h1>
                        <div class="checkout-info-form">
                           <div class="checkout-form-group">
                              <label for="#!">Full Name</label>
                              <input name="fullname" required type="text" placeholder="Full Name">
                           </div>
                           <div class="checkout-form-group">
                              <label for="#!">Birthday</label>
                              <input name="birthday" required type="date" placeholder="Birthday" max="<?php echo date('Y-m-d'); ?>" min="1960-01-01" value="1960-01-01">
                           </div>
                           <div class="checkout-form-group">
                              <label for="#!">Phone Number</label>
                              <input name="phone" required type="tel" placeholder="Phone Number" pattern="[0-9]{10,11}" required>
                           </div>
                           <div class="checkout-form-group">
                              <label for="#!">Email</label>
                              <input name="email" required type="mail" placeholder="Email">
                           </div>
                        </div>
                     </div>
                     <div class="checkout-address">
                        <h1 class="checkout-info-title">Address</h1>
                        <div class="checkout-address-form">
                           <label name="province">Tỉnh/Thành phố</label>
                           <select required name="province">
                              <option>Chọn Tỉnh/Thành phố</option>
                              <option>Thành Phố Cần Thơ</option>
                           </select>
                        </div>
                        <div class="checkout-address-form">
                           <label for="#!">Quận/Huyện</label>
                           <select required name="district">
                              <option>Chọn Quận/Huyện</option>
                              <option>Quận Ninh Kiều</option>
                              <option>Quận Ô Môn</option>
                              <option>Quận Bình Thủy</option>
                              <option>Quận Cái Răng</option>
                              <option>Quận Thốt Nốt</option>
                           </select>
                        </div>
                        <div class="checkout-form-group">
                           <label for="#!">Địa Chỉ cụ thể</label>
                           <input name="moreAddress" required type="text" placeholder="Địa Chỉ cụ thể">
                        </div>
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
                     <input type="hidden" value="<?php echo $product[0] ?>" name="productId">
                     <input type="hidden" value="<?php echo $totalprice ?>" name="productTotalPrice">
                     <input type="hidden" value="<?php echo $totalquantity ?>" name="productTotalQuantity">
                     <button name="Request_Info" type="submit" class="btn-primary">Order Now</button>
                  </div>
               </div>
            </div>
         </form>
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