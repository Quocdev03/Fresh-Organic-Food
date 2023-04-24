<?php

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

function XacDinhMaKhachHang($connect, $fullname, $address, $birthday, $phone, $email)
{
   $sql_customer = "SELECT * FROM khachhang WHERE HoTen ='" . $fullname . "' and DiaChi='" . $address . "'and NgaySinh='" . $birthday . "' and Sdt='" . $phone . "' and Email='" . $email . "'";
   return  mysqli_query($connect, $sql_customer);
}

function TongDonHang($connect)
{
   $sql = "SELECT Count(*) FROM donhang ";
   return  mysqli_query($connect, $sql);
}

function ThemDonHang($connect, $fullname, $address, $birthday, $phone, $email, $price, $currentTime)
{
   $callBack2 = XacDinhMaKhachHang($connect, $fullname, $address, $birthday, $phone, $email);
   $resultCallBack2 = mysqli_fetch_array($callBack2);
   $maKH = $resultCallBack2["MaKH"];
   $callBack = TongDonHang($connect);
   $resultCallBack = mysqli_fetch_array($callBack);
   $createPaymentCode = $resultCallBack["Count(*)"] + 1;
   $getPaymentCode = "FOF000" . $createPaymentCode;
   $createNumber = $resultCallBack["Count(*)"] + 1;
   $createId = "DH" . $createNumber;
   $sql_order = "INSERT INTO donhang (MaDH, MaKH, TgLap, TTrang, Tien, MaThanhToan)
                  VALUES ('$createId', '$maKH', '$currentTime', 'Chờ Xác Nhận', '$price','$getPaymentCode')";
   return mysqli_query($connect, $sql_order);
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
