<?php
// add_product.php - xử lý khi người dùng nhấn nút "Thêm sản phẩm"
include "config.php"; // kết nối đến cơ sở dữ liệu

if (isset($_POST['submit'])) {
   $MaSP = $_POST['MaSP'];
   $TenSP = $_POST['TenSP'];
   $Hinh_sp = $_POST['Hinh_sp'];
   $Sl = $_POST['Sl'];
   $MaL = $_POST['MaL'];
   $Gia = $_POST['Gia'];

   // thực hiện truy vấn thêm sản phẩm vào cơ sở dữ liệu
   $sql = "INSERT INTO SANPHAM (MaSP, TenSP, Hinh_sp, Sl, MaL, Gia) VALUES ('$MaSP', '$TenSP', '$Hinh_sp', '$Sl', '$MaL', '$Gia')";
   if (mysqli_query($conn, $sql)) {
      echo "Thêm sản phẩm thành công";
   } else {
      echo "Lỗi: " . mysqli_error($conn);
   }
}
