<?php
function CheckMyQuery($connect, $sql_query)
{
   if (mysqli_query($connect, $sql_query)) {
      return true;
   } else {
      return false;
   }
}
function CountKhachHang($connect)
{
   $sql_customer = "Select Count(*) from khachhang ";
   return  mysqli_query($connect, $sql_customer);
}

function ThemKhachHang($connect, $fullname, $address, $birthday, $phone, $email)
{
   $k = CountKhachHang($connect);
   $ro = mysqli_fetch_array($k);
   $so = $ro["Count(*)"] + 1;
   $ma = "KH" . $so;
   $sql_customer = "INSERT INTO khachhang (MaKH, HoTen, DiaChi, NgaySinh, Sdt, Email)
                     VALUES ('$ma', '$fullname', '$address', '$birthday', '$phone', '$email')";
   return CheckMyQuery($connect, $sql_customer);
}
