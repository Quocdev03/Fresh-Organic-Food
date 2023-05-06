<?php
require_once 'Server/Connect.php';
require_once 'Server/Session.php';
$currentTime = date('Y-m-d H:i:s');
?>
<section class="intro">
   <div class="container">
      <div class="intro-container">
         <h1 class="intro-heading">Welcome to product</h1>
      </div>
   </div>
</section>
<section class="product padding-section">
   <div class="container">
      <div class="product-bg">
         <img srcset="Images/product-bg2.png 2x" alt="">
      </div>
      <div class="product-main">
         <div class="section-heading">
            <h1>Our Product</h1>
         </div>

         <!-- Meat -->
         <div class="product-category">

            <div class="section-title">
               <h2 class="">Meat</h2>
            </div>
            <div class="product-list">
               <?php
               $sql = "SELECT * FROM sanpham WHERE MaL='Meat' AND TTrang != 'Xoá' ORDER BY TgThem DESC";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  // đổ dữ liệu vào trang web
                  while ($row = $result->fetch_assoc()) {
                     echo '<div class="product-item">
                     <div class="product-detail-icon">
                        <a href="index.php?url=Product_Detail&productId=' . $row["MaSP"] . '&productQuantity=' . $row["Sl"] . '&productDesc=' . $row["Mo_ta"] . '&productName=' . $row["TenSP"] . '&productPrice=' . $row["Gia_Moi"] . '&productImage=' . $row["Hinh_sp"] . ' 2x">More
                           <i class="fa-solid fa-angles-right"></i>
                        </a>
                     </div>
                     <form action="index.php?url=Add_To_Cart" method="post">
                        <div class="product-new">
                           <span>New</span>
                        </div>
                        <div class="offer-item-like" id="like">
                           <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="product-item-image">
                        <img srcset="Images/product/' . $row["Hinh_sp"] . ' 2x" alt="">
                        </div>
                        <div class="product-item-content">
                           <h1 class="product-item-content-title">' . $row["TenSP"] . '</h1>
                           <div class="product-item-content-price ttc-unset">
                              <div class="product-item-content-price--old">
                                 <span>' . number_format($row["Gia_Cu"]) . '</span><sup>&#8363</sup>
                              </div>
                              <div class="product-item-content-price--new">
                                 <h3>' . number_format($row["Gia_Moi"]) . '</h3><sup>&#8363</sup> <span>/kg</span>
                              </div>
                           </div>
                           <input type="hidden" name="productImage" value="' . $row["Hinh_sp"] . '">
                           <input type="hidden" name="productName" value="' . $row["TenSP"] . '">
                           <input type="hidden" name="productPrice" value="' . $row["Gia_Moi"] . '">
                           <input type="hidden" name="productId" value="' . $row["MaSP"] . '">
                           <button type="submit" name="productAdd" value="Add To Cart" class="btn-outline product-button">Add To Cart</button>
                        </div>
                     </form>
                  </div>';
                  }
               } else {
                  echo '';
               }
               ?>
            </div>
         </div>

         <!-- Fruit -->
         <div class="product-category">

            <div class="section-title">
               <h2 class="">Fruit</h2>
            </div>
            <div class="product-list">
               <?php
               $sql = "SELECT * FROM sanpham WHERE MaL='Fruit' AND TTrang != 'Xoá' ORDER BY TgThem DESC";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  // đổ dữ liệu vào trang web
                  while ($row = $result->fetch_assoc()) {
                     echo '<div class="product-item">
                     <div class="product-detail-icon">
                        <a href="index.php?url=Product_Detail&productId=' . $row["MaSP"] . '&productQuantity=' . $row["Sl"] . '&productDesc=' . $row["Mo_ta"] . '&productName=' . $row["TenSP"] . '&productPrice=' . $row["Gia_Moi"] . '&productImage=' . $row["Hinh_sp"] . ' 2x">More
                           <i class="fa-solid fa-angles-right"></i>
                        </a>
                     </div>
                     <form action="index.php?url=Add_To_Cart" method="post">
                        <div class="product-new">
                           <span>New</span>
                        </div>
                        <div class="offer-item-like" id="like">
                           <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="product-item-image">
                        <img srcset="Images/product/' . $row["Hinh_sp"] . ' 2x" alt="">
                        </div>
                        <div class="product-item-content">
                           <h1 class="product-item-content-title">' . $row["TenSP"] . '</h1>
                           <div class="product-item-content-price ttc-unset">
                              <div class="product-item-content-price--old">
                                    <span>' . number_format($row["Gia_Cu"]) . '</span><sup>&#8363</sup>
                              </div>
                              <div class="product-item-content-price--new">
                                 <h3>' . number_format($row["Gia_Moi"]) . '</h3><sup>&#8363</sup> <span>/kg</span>
                              </div>
                           </div>
                           <input type="hidden" name="productImage" value="' . $row["Hinh_sp"] . '">
                           <input type="hidden" name="productName" value="' . $row["TenSP"] . '">
                           <input type="hidden" name="productPrice" value="' . $row["Gia_Moi"] . '">
                           <input type="hidden" name="productId" value="' . $row["MaSP"] . '">
                           <button type="submit" name="productAdd" value="Add To Cart" class="btn-outline product-button">Add To Cart</button>
                        </div>
                     </form>
                  </div>';
                  }
               } else {
                  '';
               }
               ?>
            </div>
         </div>

         <!-- Vegetables -->
         <div class="product-category">

            <div class="section-title">
               <h2 class="">Vegetables</h2>
            </div>
            <div class="product-list">
               <?php
               $sql = "SELECT * FROM sanpham WHERE MaL='Veget'AND TTrang != 'Xoá' ORDER BY TgThem DESC";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  // đổ dữ liệu vào trang web
                  while ($row = $result->fetch_assoc()) {
                     echo '<div class="product-item">
                     <div class="product-detail-icon">
                        <a href="index.php?url=Product_Detail&productId=' . $row["MaSP"] . '&productQuantity=' . $row["Sl"] . '&productDesc=' . $row["Mo_ta"] . '&productName=' . $row["TenSP"] . '&productPrice=' . $row["Gia_Moi"] . '&productImage=' . $row["Hinh_sp"] . ' 2x">More
                           <i class="fa-solid fa-angles-right"></i>
                        </a>
                     </div>
                     <form action="index.php?url=Add_To_Cart" method="post">
                        <div class="product-new">
                           <span>New</span>
                        </div>
                        <div class="offer-item-like" id="like">
                           <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="product-item-image">
                        <img srcset="Images/product/' . $row["Hinh_sp"] . ' 2x" alt="">
                        </div>
                        <div class="product-item-content">
                           <h1 class="product-item-content-title">' . $row["TenSP"] . '</h1>
                           <div class="product-item-content-price ttc-unset">
                              <div class="product-item-content-price--old">
                                    <span>' . number_format($row["Gia_Cu"]) . '</span><sup>&#8363</sup>
                              </div>
                              <div class="product-item-content-price--new">
                                 <h3>' . number_format($row["Gia_Moi"]) . '</h3><sup>&#8363</sup> <span>/kg</span>
                              </div>
                           </div>
                           <input type="hidden" name="productImage" value="' . $row["Hinh_sp"] . '">
                           <input type="hidden" name="productName" value="' . $row["TenSP"] . '">
                           <input type="hidden" name="productPrice" value="' . $row["Gia_Moi"] . '">
                           <input type="hidden" name="productId" value="' . $row["MaSP"] . '">
                           <button type="submit" name="productAdd" value="Add To Cart" class="btn-outline product-button">Add To Cart</button>
                        </div>
                     </form>
                  </div>';
                  }
               } else {
                  '';
               }
               ?>
            </div>
         </div>

         <!-- Fast Food -->
         <div class="product-category">

            <div class="section-title">
               <h2 class="">Fast Food</h2>
            </div>
            <div class="product-list">
               <?php
               $sql = "SELECT * FROM sanpham WHERE MaL='FastF'AND TTrang != 'Xoá' ORDER BY TgThem DESC";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  // đổ dữ liệu vào trang web
                  while ($row = $result->fetch_assoc()) {
                     echo '<div class="product-item">
                     <div class="product-detail-icon">
                        <a href="index.php?url=Product_Detail&productId=' . $row["MaSP"] . '&productQuantity=' . $row["Sl"] . '&productDesc=' . $row["Mo_ta"] . '&productName=' . $row["TenSP"] . '&productPrice=' . $row["Gia_Moi"] . '&productImage=' . $row["Hinh_sp"] . ' 2x">More
                           <i class="fa-solid fa-angles-right"></i>
                        </a>
                     </div>
                     <form action="index.php?url=Add_To_Cart" method="post">
                        <div class="product-new">
                           <span>New</span>
                        </div>
                        <div class="offer-item-like" id="like">
                           <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="product-item-image">
                        <img srcset="Images/product/' . $row["Hinh_sp"] . ' 2x" alt="">
                        </div>
                        <div class="product-item-content">
                           <h1 class="product-item-content-title">' . $row["TenSP"] . '</h1>
                           <div class="product-item-content-price ttc-unset">
                              <div class="product-item-content-price--old">
                                    <span>' . number_format($row["Gia_Cu"]) . '</span><sup>&#8363</sup>
                              </div>
                              <div class="product-item-content-price--new">
                                 <h3>' . number_format($row["Gia_Moi"]) . '</h3><sup>&#8363</sup> <span>/kg</span>
                              </div>
                           </div>
                           <input type="hidden" name="productImage" value="' . $row["Hinh_sp"] . '">
                           <input type="hidden" name="productName" value="' . $row["TenSP"] . '">
                           <input type="hidden" name="productPrice" value="' . $row["Gia_Moi"] . '">
                           <input type="hidden" name="productId" value="' . $row["MaSP"] . '">
                           <button type="submit" name="productAdd" value="Add To Cart" class="btn-outline product-button">Add To Cart</button>
                        </div>
                     </form>
                  </div>';
                  }
               } else {
                  '';
               }
               ?>
            </div>
         </div>

      </div>
   </div>
</section>