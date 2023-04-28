<?php
require_once 'Server/Connect.php';
require_once 'Server/Function.php';
require_once 'Server/Function.php';

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
   $TotalPrice = $_POST['TotalPrice'];
   $ThemDonHang = ThemDonHang($conn, $TotalPrice, $currentTime);

   // Thêm dữ liệu vào bảng hoá đơn
   // Cập Nhật lại số lượng sản phẩm
   $MaDH = $ThemDonHang['MaDH'];
   foreach ($_SESSION['DetailProduct'] as $productDetail) {
      $productId = $productDetail['productId'];
      $productQuantity = $productDetail['productQuantity'];
      $ThemHoaDon = ThemHoaDon($conn, $MaDH, $productId, $productQuantity);
   }

   if ($ThemDonHang !== false && $ThemKhachHang === true && $ThemHoaDon === true) {
      require_once 'Server/Session.php';
      $_SESSION['payment_successful'] = true;

      if (isset($ThemDonHang['MaDH'])) {
         $_SESSION['MaDH'] = $ThemDonHang['MaDH'];
      }
      if (isset($ThemDonHang['MaKH'])) {
         $_SESSION['MaKH'] = $ThemDonHang['MaKH'];
      }
      if (isset($ThemDonHang['MaThanhToan'])) {
         $_SESSION['MaThanhToan'] = $ThemDonHang['MaThanhToan'];
      }
      if (isset($ThemDonHang['TTrang'])) {
         $_SESSION['TTrang'] = $ThemDonHang['TTrang'];
      }

      $_SESSION['TgLap'] = $currentTime;
      $_SESSION['TotalPrice'] = $_POST['TotalPrice'];
      $_SESSION['TotalQuantity'] = $_POST['TotalQuantity'];

      $_SESSION['fullname'] = $_POST['fullname'];
      $_SESSION['phone'] = $_POST['phone'];
      $_SESSION['email'] = $_POST['email'];
      unset($_SESSION['cart']);
      header("Location: index.php?url=Payment_Complete");
   } else {
      require 'Page/404.php';
   }
}
