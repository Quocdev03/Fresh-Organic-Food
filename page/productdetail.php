<?php
$productId = $_GET['productId'];
$productName = $_GET['productName'];
$productPrice = $_GET['productPrice'];
$productImage = $_GET['productImage'];
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
         <form action="index.php?url=addtocart" method="post">
            <div class="detail-container">
               <input type="hidden" name="productId" value="<?php echo $productId; ?>">
               <input type="hidden" name="productImage" value="<?php echo $productImage; ?>">
               <input type="hidden" name="productName" value="<?php echo $productName; ?>">
               <input type="hidden" name="productPrice" value="<?php echo $productPrice; ?>">
               <div class="detail-image">
                  <div class="detail-image-top">
                     <img data-item="1" class="detail-image-item--show is-show" srcset="<?php echo $productImage ?>" alt="">
                     <img data-item="2" class="detail-image-item--show" srcset="<?php echo $productImage ?>" alt="">
                     <img data-item="3" class="detail-image-item--show" srcset="<?php echo $productImage ?>" alt="">
                     <img data-item="4" class="detail-image-item--show" srcset="<?php echo $productImage ?>" alt="">
                  </div>
                  <div class="detail-image-bottom">
                     <img data-item="1" class="detail-image-bottom-item is-active" srcset="<?php echo $productImage ?>" alt="">
                     <img data-item="2" class="detail-image-bottom-item " srcset="<?php echo $productImage ?>" alt="">
                     <img data-item="3" class="detail-image-bottom-item " srcset="<?php echo $productImage ?>" alt="">
                     <img data-item="4" class="detail-image-bottom-item " srcset="<?php echo $productImage ?>" alt="">
                  </div>
                  <div class="detail-image-button">
                     <button type="submit" name="productAdd" value="Add To Cart" class="btn-outline ">Add To Cart</button>
                     <a href="index.php?url=product" class="btn-primary">Product</a>
                  </div>
               </div>
               <div class="detail-content">
                  <h1 class="detail-content__title"><?php echo $productName ?></h1>
                  <div class="detail-content-price">
                     <div class="detail__price">
                        <h2>
                           <?php echo $productPrice ?>
                        </h2><sup>&#8363</sup>
                     </div>
                     <span class="detail-content__category">/kg</span>
                  </div>
                  <p class="detail-content__desc">
                     It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here.</p>
                  <div class="detail-content__logo">
                     <img src="images/detailproduct/detaillogo1.svg" alt="">
                     <img src="images/detailproduct/detaillogo2.svg" alt="">
                     <img src="images/detailproduct/detaillogo3.svg" alt="">
                     <img src="images/detailproduct/detaillogo4.svg" alt="">
                  </div>
                  <div class="detail-content__about">
                     <div class="detail-content__about--title">
                        <h1>About the Product</h1>
                     </div>
                     <div class="detail-content__about--bottom">
                        <span class="detail-content__about--desc">100% Organic Food</span>
                        <span class="detail-content__about--desc">100% Organic Food</span>
                        <span class="detail-content__about--desc">100% Organic Food</span>
                        <span class="detail-content__about--desc">100% Organic Food</span>
                     </div>
                  </div>
                  <div class="detail-content__seller">
                     <div class="detail-content__seller--title">
                        <h1>About the Seller</h1>
                     </div>
                     <p class="detail-content__seller--desc">
                        It is a long established fact that a reader will be distracted by the readable content of page when looking at layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                     </p>
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
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                  the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or
                  randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                  anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks necessary,
                  making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined a handful of model sentence structures,
                  to generate Lorem Ipsum which looks reasonable.
                  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
                  Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable
                  English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and search for lorem ipsum
                  will uncover many web sites still in their infancy.
               </p>
            </div>
         </form>
      </div>
   </section>

</main>