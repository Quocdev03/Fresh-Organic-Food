<?php
require_once 'Server/Connect.php';
require_once 'Server/Function.php';
require_once 'Server/Session.php';
$currentTime = date('Y-m-d H:i:s');
if (isset($_POST['Request_Info'])) {

   // Thêm dữ liệu vào bảng khách hàng
   $fullname = $_POST['fullname'];
   $birthday = $_POST['birthday'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $province = $_POST['province'];
   $district = $_POST['district'];
   $moreAddress = $_POST['moreAddress'];
   $address = $moreAddress . ', ' . $district . ', ' . $province;
   $ThemKhachHang = ThemKhachHang($conn, $fullname, $address, $birthday, $phone, $email);
   // Thêm dữ liệu vào bảng đơn hàng
   $productTotalPrice = $_POST['productTotalPrice'];
   XacDinhMaKhachHang($conn, $fullname, $address, $birthday, $phone, $email);
   $ThemDonHang = ThemDonHang($conn, $fullname, $address, $birthday, $phone, $email, $productTotalPrice, $currentTime);

   if ($ThemDonHang === true && $ThemKhachHang === true) {
      header("Location: index.php?url=Payment_Complete");
   } else {
      require 'Page/404.php';
   }
}
