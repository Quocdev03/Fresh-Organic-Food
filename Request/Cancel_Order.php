<?php
require_once 'Server/Connect.php';
require_once 'Server/Function.php';
require_once 'Server/Session.php';
if (isset($_POST['MaDH']) && (isset($_POST['MaKH'])) && (isset($_POST['MaThanhToan']))) {
   $_MaDH = $_POST['MaDH'];
   $_MaKH = $_POST['MaKH'];
   $_MaThanhToan = $_POST['MaThanhToan'];
   $HuyDonHang = HuyDonHang($conn, $_MaDH, $_MaKH, $_MaThanhToan);
}
