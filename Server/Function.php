<?php
require_once "Server/Connect.php";

function TongKhachHang($connect)
{
   $sql_customer = "SELECT Count(*) FROM khachhang ";
   return  mysqli_query($connect, $sql_customer);
}

function ThemKhachHang($connect, $fullname, $address, $birthday, $phone, $email)
{
   $callBack = TongKhachHang($connect);
   $resultCallBack = mysqli_fetch_array($callBack);
   $createNumber = $resultCallBack["Count(*)"] + 1;
   $createId = "KH" . $createNumber;
   $sql_customer = "INSERT INTO khachhang (MaKH, HoTen, DiaChi, NgaySinh, Sdt, Email)
                     VALUES ('$createId', '$fullname', '$address', '$birthday', '$phone', '$email')";
   return mysqli_query($connect, $sql_customer);
}

function TongDonHang($connect)
{
   $sql = "SELECT Count(*) FROM donhang ";
   return  mysqli_query($connect, $sql);
}

function ThemDonHang($connect, $price, $currentTime)
{
   $goiHam1 = TongKhachHang($connect);
   $ketQuaHam1 = mysqli_fetch_array($goiHam1);
   $taoSo1 = $ketQuaHam1["Count(*)"];
   $layMaKhachHang = "KH" . $taoSo1;

   $goiHam2 = TongDonHang($connect);
   $ketQuaHam2 = mysqli_fetch_array($goiHam2);
   $taoSo2 = $ketQuaHam2["Count(*)"] + 1;
   $taoMaDonHang = "DH" . $taoSo2;
   $taoMaThanhToan = "FOF" . $taoSo2;

   $sql_order = "INSERT INTO donhang (MaDH, MaKH, TgLap, TTrang, Tien, MaThanhToan)
                  VALUES ('$taoMaDonHang', '$layMaKhachHang', '$currentTime', 'Chưa Xác Nhận', '$price','$taoMaThanhToan')";
   $success = mysqli_query($connect, $sql_order);

   if ($success) {
      return array('MaKH' => $layMaKhachHang, 'MaDH' => $taoMaDonHang, 'TgLap' => $currentTime, 'MaThanhToan' => $taoMaThanhToan, 'TTrang' => 'Chưa Xác Nhận');
   } else {
      return false;
   }
}

function HuyDonHang($connect, $MaDH, $MaKH, $MaThanhToan)
{
   $sql_cancel = "UPDATE donhang SET TTrang ='Đã Bị Hủy' WHERE MaDH = '$MaDH' AND MaKH = '$MaKH' AND MaThanhToan = '$MaThanhToan'";
   return mysqli_query($connect, $sql_cancel);
}

function TongYKienKhachHang($connect)
{
   $sql_customer = "SELECT Count(*) FROM ykienkhachhang ";
   return  mysqli_query($connect, $sql_customer);
}

function YKienKhachHang($connect, $fullname, $email, $message)
{
   $callBack = TongYKienKhachHang($connect);
   $resultCallBack = mysqli_fetch_array($callBack);
   $createNumber = $resultCallBack["Count(*)"] + 1;
   $createId = "YKH" . $createNumber;
   $sql_customer = "INSERT INTO ykienkhachhang (MaYK, HoTen, Email, YKien)
                     VALUES ('$createId', '$fullname', '$email','$message')";
   return mysqli_query($connect, $sql_customer);
}

function ThemHoaDon($connect, $MaDH, $MaSP, $Sl)
{
   $sql_bill = "INSERT INTO hoadon (MaDH, MaSP, Sl)
   VALUES ('$MaDH', '$MaSP', '$Sl')";
   return mysqli_query($connect, $sql_bill);
}
