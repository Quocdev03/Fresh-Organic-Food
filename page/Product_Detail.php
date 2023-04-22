<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
ob_start();
if ((isset($_GET['url']) && $_GET['url'] == 'Product_Detail')) {
   $productId = $_GET['productId'];
   $productName = $_GET['productName'];
   $productImage = $_GET['productImage'];
   $productPrice = $_GET['productPrice'];
   $productDesc = $_GET['productDesc'];
   $productQuantity = $_GET['productQuantity'];
} else {
   require 'Page/404.php';
}

?>
<main>

   <section class="intro">
      <div class="container">
         <div class="intro-container">
            <h1 class="intro-heading">Welcome to detail page</h1>
         </div>
      </div>
   </section>

   <section class="detail padding-section">
      <div class="container">
         <form action="index.php?url=Add_To_Cart" method="post">
            <input type="hidden" name="productId" value="<?php echo $productId; ?>">
            <input type="hidden" name="productName" value="<?php echo $productName; ?>">
            <input type="hidden" name="productImage" value="<?php echo $productImage; ?>">
            <input type="hidden" name="productPrice" value="<?php echo $productPrice; ?>">
            <input type="hidden" name="productQuantity" value="<?php echo $productQuantity; ?>">
            <div class="detail-container">
               <div class="detail-image">
                  <div class="detail-image-top">
                     <img data-item="1" class="detail-image-item--show is-show" srcset="Images/product/<?php echo $productImage ?>" alt="">
                     <img data-item="2" class="detail-image-item--show" srcset="Images/product/<?php echo $productImage ?>" alt="">
                     <img data-item="3" class="detail-image-item--show" srcset="Images/product/<?php echo $productImage ?>" alt="">
                     <img data-item="4" class="detail-image-item--show" srcset="Images/product/<?php echo $productImage ?>" alt="">
                  </div>
                  <div class="detail-image-bottom">
                     <img data-item="1" class="detail-image-bottom-item is-active" srcset="Images/product/<?php echo $productImage ?>" alt="">
                     <img data-item="2" class="detail-image-bottom-item " srcset="Images/product/<?php echo $productImage ?>" alt="">
                     <img data-item="3" class="detail-image-bottom-item " srcset="Images/product/<?php echo $productImage ?>" alt="">
                     <img data-item="4" class="detail-image-bottom-item " srcset="Images/product/<?php echo $productImage ?>" alt="">
                  </div>
                  <div class="detail-image-button">
                     <button type="submit" name="productAdd" value="Add To Cart" class="btn-outline ">Add To Cart</button>
                     <a href="index.php?url=product" class="btn-primary">Product</a>
                  </div>
               </div>
               <div class="detail-content">
                  <h1 class="detail-content__title"><?php echo  $productName ?></h1>
                  <div class="detail-content-price">
                     <div class="detail__price">
                        <h2>
                           <?php echo number_format($productPrice) ?>
                        </h2><sup>&#8363</sup>
                     </div>
                     <span class="detail-content__category">/kg</span>
                  </div>
                  <p class="detail-content__desc">
                     <?php echo $productDesc ?>
                  </p>
                  <div class="detail-content__logo">
                     <img src="Images/detailproduct/detaillogo1.svg" alt="">
                     <img src="Images/detailproduct/detaillogo2.svg" alt="">
                     <img src="Images/detailproduct/detaillogo3.svg" alt="">
                     <img src="Images/detailproduct/detaillogo4.svg" alt="">
                  </div>
                  <div class="detail-content__about">
                     <div class="detail-content__about--title">
                        <h1>About the Product</h1>
                     </div>
                     <div class="detail-content__about--bottom">
                        <span class="detail-content__about--desc">100% Organic Food</span>
                        <span class="detail-content__about--desc">Grown without synthetic chemicals</span>
                        <span class="detail-content__about--desc">No artificial flavors or preservatives</span>
                        <span class="detail-content__about--desc">Delicious and nutritious</span>
                        <span class="detail-content__about--desc">Environmentally friendly</span>
                        <span class="detail-content__about--desc">Certified organic</span>
                        <span class="detail-content__about--desc">High-quality and pure</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="detail-desc">
               <div class="section-title detail-desc-title">
                  <h2>
                     Description
                  </h2>
               </div>
               <p>
                  Our company is dedicated to providing the highest quality services to our clients. We pride ourselves on our commitment to customer satisfaction and have a team of experienced professionals who are passionate about their work. Our goal is to exceed our customers' expectations and provide them with exceptional service. We value honesty, integrity, and transparency in all of our business dealings and are committed to sustainability and minimizing our environmental impact. Our company culture is focused on innovation, collaboration, and continuous improvement. We believe in giving back to our community through charitable donations and volunteer work.
               </p>
            </div>
         </form>
      </div>
   </section>

</main>