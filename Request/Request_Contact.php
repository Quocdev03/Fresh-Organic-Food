<?php
require_once 'Server/Connect.php';
require_once 'Server/Function.php';
require_once 'Server/Session.php';

if (isset($_POST['requestContactCustomer'])) {
   $fullName = $_POST['fullName'];
   $email = $_POST['email'];
   $message = $_POST['message'];

   $resultYKienKhachHang = YKienKhachHang($conn, $fullName, $email, $message);
   if ($resultYKienKhachHang === true) {
      header("Location: index.php?url=Contact");
   } else {
      require './Page/404.php';
   }
}
