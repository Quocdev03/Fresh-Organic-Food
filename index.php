<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');
if (!isset($_GET["url"])) {
   header("Location: index.php?url=Home");
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
   <link rel="stylesheet" href="./Css/Font_Awesome_6.4.0/css/all.css">
   <link rel="stylesheet" href="./Css/Reset.css">
   <link rel="stylesheet" href="./Css/Variables.css">
   <link rel="stylesheet" href="./Css/Global.css">
   <link rel="stylesheet" href="./Css/Component.css">
   <link rel="icon" href="./Images/icon/favicon.png" type="image/x-icon" />
   <title>Fresh Organic Food</title>
</head>

<body>

   <div class="wrapper">

      <div class="header">
         <header class="header-main" id="header-main">
            <div class="container">
               <?php
               require "Page/Header.php"
               ?>
            </div>
         </header>

         <?php
         if (isset($_GET["url"])) {
            $page = $_GET["url"];
            if ($page == "Home") {
               require "Page/Hero.php";
            }
         }
         ?>

      </div>

      <main>

         <?php
         if (isset($_GET["url"])) {
            $page = $_GET["url"];
            if ($page == "Home") {
               require "Page/Home.php";
            } elseif ($page == "Product") {
               require "Page/Product.php";
            } elseif ($page == "Product_Detail") {
               require "Page/Product_Detail.php";
            } elseif ($page == "Cart") {
               require "Page/Cart.php";
            } elseif ($page == "Contact") {
               require "Page/Contact.php";
            } elseif ($page == "Checkout") {
               require "Page/Checkout.php";
            } elseif ($page == "Payment_Complete") {
               require "Page/Payment_Complete.php";
            } elseif ($page == "Add_To_Cart") {
               require "Request/Add_To_Cart.php";
            } elseif ($page == "Remove_To_Cart") {
               require "Request/Remove_To_Cart.php";
            } elseif ($page == "Update_Cart_Quantity") {
               require "Request/Update_Cart_Quantity.php";
            } elseif ($page == "Request_Order_Bill") {
               require "Request/Request_Order_Bill.php";
            } elseif ($page == "Request_Contact_Customer") {
               require "Request/Request_Contact_Customer.php";
            } elseif ($page == "Payment_Complete") {
               require "Request/Payment_Complete.php";
            } elseif ($page == "Admin") {
               require "./Admin/index.php";
            } else {
               require "Page/404.php";
            }
         } else {
            require "Page/404.php";
         }
         ?>

      </main>

      <footer class="footer">
         <div class="container">
            <?php
            require "Page/Footer.php"
            ?>
         </div>
      </footer>

   </div>

   <script src="./Script/App.js"></script>
</body>

</html>