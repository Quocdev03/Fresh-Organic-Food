<?php
if (!isset($_GET["url"])) {
   header("Location: index.php?url=home");
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
   <link rel="stylesheet" href="./css/reset.css">
   <link rel="stylesheet" href="./css/variables.css">
   <link rel="stylesheet" href="./css/global.css">
   <link rel="stylesheet" href="./css/component.css">
   <link rel="icon" href="./images/icon/favicon.png" type="image/x-icon" />
   <title>Fresh Organic Food</title>
</head>

<body>

   <div class="wrapper">

      <div class="header">
         <header class="header-main" id="header-main">
            <div class="container">
               <?php
               require "page/header.php"
               ?>
            </div>
         </header>

         <?php
         if (isset($_GET["url"])) {
            $page = $_GET["url"];
            if ($page == "home") {
               require "page/hero.php";
            }
         }
         ?>

      </div>

      <main>

         <?php
         if (isset($_GET["url"])) {
            $page = $_GET["url"];
            if ($page == "home") {
               require "page/home.php";
            }
            if ($page == "product") {
               require "page/product.php";
            }
            if ($page == "addtocart") {
               require "page/addtocart.php";
            }
            if ($page == "deltocart") {
               require "page/deltocart.php";
            }
            if ($page == "cart") {
               require "page/cart.php";
            }
            if ($page == "productdetail") {
               require "page/productdetail.php";
            }
            if ($page == "contact") {
               require "page/contact.php";
            }
            if ($page == "404") {
               require "page/404.php";
            }
            if ($page == "admin") {
               require "/admin/admin.php";
            }
         }
         ?>

      </main>

      <footer class="footer">
         <div class="container">
            <?php
            require "page/footer.php"
            ?>
         </div>
      </footer>

   </div>

   <script src="./script/app.js"></script>
</body>

</html>