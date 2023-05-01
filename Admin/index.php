<?php
require 'conn.php';
require 'function.php';
require 'define.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
if (!$_SESSION['user'] || $_SESSION['quyen'] != 1) {
   header("location:login.php");
} else {
?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/button_duyet.css">
      <link rel="stylesheet" href="css/clickpage.css">
      <link rel="stylesheet" href="css/donhang.css">
      <link rel="stylesheet" href="css/index.css">
      <link rel="stylesheet" href="css/form.css">
      <link rel="stylesheet" href="css/sanpham.css">
      <link rel="stylesheet" href="css/sea_sp.css">
      <link rel="stylesheet" href="css/log_out.css">
      <link rel="stylesheet" href="css/info_donhang.css">
      <link rel="stylesheet" href="css/left.css">
      <link rel="stylesheet" href="css/quanlygia-doanhthu.css">
      <link rel="stylesheet" href="css/root.css">
      <link rel="stylesheet" href="css/table.css">
      <link rel="stylesheet" href="css/top.css">
      <title>Document</title>
   </head>

   <body>
      <div class="body">
         <div class="top">
            <?php
            require "php/top.php";
            ?>
         </div>
         <div class="bottom">
            <div class="left">
               <?php
               require "php/left.php"
               ?>
            </div>
            <div class="right">
               <?php
               if (isset($_GET["url"])) {
                  $bien = $_GET["url"];
                  if ($bien == "sanpham") {
                     require "php/sanpham.php";
                  } elseif ($bien == "quanlygia") {
                     require "php/quanlygia.php";
                  } else if ($bien == "donhang") {
                     require "php/donhang.php";
                  } elseif ($bien == "danhgia") {
                     require "php/danhgia.php";
                  } elseif ($bien == "doanhthu") {
                     require "php/doanhthu.php";
                  }
               }
               ?>
            </div>
         </div>
      </div>
   </body>

   </html>
<?php } ?>