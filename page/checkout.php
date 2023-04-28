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
         <form action="index.php?url=Request_Order" method="POST">
            <div class="checkout-main">
               <div class="checkout-content">
                  <h1 class="checkout-info-heading">Order Checkout</h1>
                  <div class="checkout-bottom">
                     <div class="checkout-info">
                        <h1 class="checkout-info-title">Personal</h1>
                        <div class="checkout-info-form">
                           <div class="checkout-form-group">
                              <label for="#!">Full Name</label>
                              <input class="personal_name" name="fullname" required type="text" placeholder="Full Name">
                              <div class="input-icons">
                                 <i class="fa fa-check"></i>
                                 <i class="fa fa-times"></i>
                              </div>
                           </div>
                           <div class="checkout-form-group">
                              <label for="#!">Birthday</label>
                              <input name="birthday" required type="date" placeholder="Birthday" max="<?php echo date('Y-m-d'); ?>" min="1960-01-01" value="1960-01-01">
                           </div>
                           <div class="checkout-form-group">
                              <label for="#!">Phone Number</label>
                              <input class="personal_phone" name="phone" required type="tel" placeholder="Phone Number" pattern="[0-9]{10,11}" required>
                              <div class="input-icons">
                                 <i class="fa fa-check"></i>
                                 <i class="fa fa-times"></i>
                              </div>
                           </div>
                           <div class="checkout-form-group">
                              <label for="#!">Email</label>
                              <input class="personal_email" name="email" required type="mail" placeholder="Email">
                              <div class="input-icons">
                                 <i class="fa fa-check"></i>
                                 <i class="fa fa-times"></i>
                              </div>
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
                           <h1>Detail</h1>
                        </div>
                        <!-- Lấy ra tên, tính tổng tiền của từng loại sản phẩm -->
                        <!-- Tạo mảng và lưu trong 1 session mới để dùng cho trang PaymentComplete.php -->
                        <?php
                        $_SESSION["DetailProduct"] = array();
                        foreach ($_SESSION['cart'] as $product) {
                           $subtotal = $product[3] * $product[4];
                           $DetailProduct = array(
                              'productId' => $product[0],
                              'productName' => $product[1],
                              'productQuantity' => $product[4],
                              'productPrice' => $subtotal
                           );
                           array_push($_SESSION['DetailProduct'], $DetailProduct);
                           echo ' <div class="cart-payment-detail__sub">
                        <h1>' . $product[1] . '</h1>
                        <span>' . number_format($subtotal) . '<sup>&#8363</sup></span></div>';
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
                              <!-- Lấy tất cả số lượng sản phẩm có trong giỏ hàng -->
                              <?php
                              $totalquantity = 0;
                              foreach ($_SESSION['cart'] as $product) {
                                 $totalquantity = $totalquantity + $product[4];
                              }
                              ?>
                              <span><?php echo number_format($totalquantity) ?></span>
                           </div>
                           <div class="cart-payment-detail__total--item">
                              <h1>Price</h1>
                              <!-- Tính tổng tất tiền tất cả sản phẩm trong giỏ hàng -->
                              <?php
                              $totalprice = 0;
                              foreach ($_SESSION['cart'] as $product) {
                                 $subtotal = $product[3] * $product[4];
                                 $totalprice += $subtotal;
                              }
                              ?>
                              <span><?php echo number_format($totalprice) ?><sup>&#8363</sup></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="cart-payment-checkout">
                     <!-- Truyền 'Id','Tên','Giá','Số Lượng' của từng sản phẩm, và tổng 'tiền','số lượng' của tất cả sản phẩm sang trang Request_Order -->
                     <input type="hidden" value="<?php echo $product[0] ?>" name="productId">
                     <input type="hidden" value="<?php echo $product[1] ?>" name="productName">
                     <input type="hidden" value="<?php echo $product[3] ?>" name="productPrice">
                     <input type="hidden" value="<?php echo $product[4] ?>" name="productQuantity">
                     <input type="hidden" value="<?php echo $totalprice ?>" name="TotalPrice">
                     <input type="hidden" value="<?php echo $totalquantity ?>" name="TotalQuantity">
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
            <a class="btn-primary" href="index.php?url=Product">Return to product</a>
         </div>
      </div>
   </section>
<?php
}
?>