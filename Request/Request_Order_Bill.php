<?php
require_once 'Server/Connect.php';
require_once 'Server/Function.php';
// kiểm tra xem session đã được khởi tạo chưa
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
ob_start();
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
   $resultThemKhachHang = ThemKhachHang($conn, $fullname, $address, $birthday, $phone, $email);
   if ($resultThemKhachHang === true) {
      echo "thao tác thực hiện thành công";
   } else {
      echo "Thao tác thất bại";
   }

   // Thêm dữ liệu vào bảng đơn hàng
   $productId = $_POST['productId'];
   $productTotalPrice = $_POST['productTotalPrice'];
   $productTotalQuantity = $_POST['productTotalQuantity'];

   // "INSERT INTO donhang (MaDH, MaSP, Sl)
   //          VALUES ('$product_id', '$quantity')"

   // $sql_order =;
   // if ($conn->query($sql_order) === FALSE) {
   //    echo "Error: ";
   // }

   // // if (($conn->query($sql_customer) === true) && ($conn->query($sql_order) === true)) {
   // //    header("Location index.php?url=Payment_Complete");
   // // }

}
