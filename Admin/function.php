<?php
// Hien Thi SanPham
function sanpham($kn,$n)
{
    if($n==-1)
    {
        $sql ="select * from sanpham where TTrang != 'Xóa' order by TgThem desc";
    }
    else
    {
        $sql ="select * from sanpham where TTrang != 'Xóa' order by TgThem desc limit ".$n.",".biensanpham;
    }
    return  mysqli_query($kn , $sql);
}

//Hien Thi Don Hang
function donhang($kn,$n)
{
    if($n==-1)
    {
        $sql ="select * from donhang where TTrang != 'Đã Bị Hủy' order by TgLap desc";
    }
    else
    {
        $sql ="select * from donhang where TTrang != 'Đã Bị Hủy' order by TgLap desc limit ".$n.",".biendonhang;
    }
    return  mysqli_query($kn , $sql);
}

// Hien Thi Y Kien Khach Hang
function danhgia($kn,$n)
{
    if($n==-1)
    {
        $sql ="select * from ykienkhachhang  WHERE TTrang <> 'Đã đọc' order by MaYK desc";
    }
    else
    {
        $sql ="select * from ykienkhachhang  WHERE TTrang <> 'Đã đọc' order by MaYK desc limit ".$n.",".bienykien;
    }
    return  mysqli_query($kn , $sql);
}

// Dung Trong Clickpage
//
function page_next($kn,$p)
{
    if( $kn <= 4)
    {
        return 3;
    }
    elseif (isset($_GET[$p]) && ($_GET[$p] > $kn-3 ) )
    {
        return $kn-1;
    }
    elseif(isset($_GET[$p]) && ($_GET[$p] >2)) 
    {
        $b = $_GET[$p]; 
        return $b +1;
    }
    else
    {
        echo 3;
    } 
}
function page_before($kn,$p)
{
    if( $kn <= 4)
    {
        return 1;
    }
    elseif (isset($_GET[$p]) && ($_GET[$p] > $kn-3 ) )
    {
        return $kn-3;
    }
    elseif(isset($_GET[$p]) && ($_GET[$p] >1) ) 
    {
        $b = $_GET[$p]; 
        return $b -1;
    }
    else
    {
        echo 1;
    }
     
}
function page_present($kn ,$p)
{
    if( $kn <= 4)
    {
        return 2;
    }
    elseif (isset($_GET[$p]) && ($_GET[$p] > $kn-3 ) )
    {
        return $kn-2;
    }
    elseif(isset($_GET[$p]) && ($_GET[$p] >2 )) 
    {
        $b = $_GET[$p]; 
        return $b ;
    }
    else
    {
        echo 2;
    } 
}
//

// Hien THi THong Tin Tung Khach Hang
function Khachhang($kn,$ma)
{
    $sql= "select * from khachhang where MaKH='".$ma."'";
    return  mysqli_query($kn , $sql);
}

// Hien Thi Thong Tin Tung San Pham Da Mua Moi Don Hang
function hoadon($kn,$ma,$n)
{
    if($n==-1)
    {
        $sql="select TenSP, hoadon.sl as sl , Hinh_sp,hoadon.MaSP as MaSP FROM hoadon,sanpham WHERE hoadon.MaSP=sanpham.MaSP and MaDH ='".$ma."'";
    }
    else
    {
        $sql="select TenSP, hoadon.sl as sl , Hinh_sp,hoadon.MaSP as MaSP FROM hoadon,sanpham WHERE hoadon.MaSP=sanpham.MaSP and MaDH ='".$ma."' limit ".$n.",".bienhoadon;
    }
    return  mysqli_query($kn , $sql);
}

// So luong Tung San Pham Dang  Xu Ly
function Sl_xacnhan ($kn,$id)
{
    $sql="select sum(hoadon.sl) as Sl_dxn,sanpham.MaSP as MaSP from hoadon,sanpham,donhang WHERE hoadon.MaSP=sanpham.MaSP and donhang.MaDH=hoadon.MaDH and donhang.TTrang='Chưa Xác Nhận'  and hoadon.MaSP='".$id."' group by sanpham.MaSP";
    return  mysqli_query($kn , $sql);
}

//So luong Tung San Pham Da Ban
function doanhthu ($kn,$id)
{
    $sql="select sum(hoadon.sl) as Sl_ban,sanpham.MaSP as MaSP  from hoadon,sanpham,donhang WHERE hoadon.MaSP=sanpham.MaSP and donhang.MaDH=hoadon.MaDH and donhang.TTrang='Đã xác nhận' and hoadon.MaSP='".$id."' group by sanpham.MaSP";
    return  mysqli_query($kn , $sql);
}

//Them San Pham
//
function CountSP($kn)
{
    $sql="Select Count(*) from SanPham ";
    return  mysqli_query($kn , $sql);
}
function ThemSP($kn,$Hinh,$Ten,$Sl,$Mota,$MaL,$Gia)
{
    $k = CountSP($kn);
   $ro = mysqli_fetch_array($k);
   $so = $ro["Count(*)"] +1;
   $ma = "SP".$so;
   $sql ="Insert Into SANPHAM values('".$ma."','".$MaL."','".$Ten."','".$Hinh."','".$Mota."',".$Gia.",".$Gia.",".$Sl.",Now(),'')";
   return mysqli_query($kn , $sql);
}
//

//Hien Thi Cac Loai San Pham
function loai($kn)
{
    $sql ="select * from phanloai ";
   return mysqli_query($kn , $sql);
}

// Duyet Don Hang
function Duyetdon($kn,$ma,$a)
{
    if($a ==1)
    { $sql="update donhang set TTrang = 'Đã Xác Nhận' where MaDH ='".$ma."'";}
    if($a ==2)
    {
        $sql="update donhang set TTrang = 'Đã Xác Nhận' where TTrang ='Chưa Xác Nhận'";
    }
    return mysqli_query($kn , $sql);
}

// Xoa San Pham
function XoaSP($kn,$ma)
{
    $sql="delete from sanpham where MaSP='".$ma."'";
    return mysqli_query($kn , $sql);
}


//Thay Doi Gia Trong Mot THoi Gian
function ChinhGiaMoi($kn,$ma,$money,$a)
{
    if($a ==1)
    {
        $aa=SanphamMa($kn,$ma);
        $r=mysqli_fetch_array($aa);
        $g=$r["Gia_Cu"];
        $sql="update sanpham set Gia_Moi = ".$g." where MaSP ='".$ma."'";
    }
    if($a ==2)
    {
        $sql="update sanpham set Gia_Moi = ".$money." ,TgThem = now() where MaSP ='".$ma."'";
    }
    return mysqli_query($kn , $sql);
}

//Doc Cac Y Kien Khach Hang
function docykien($kn,$ma,$a)
{
    if($a ==1)
    {
        $sql="update ykienkhachhang set TTrang ='Đã đọc' where MaYK ='".$ma."'";
    }
    if($a ==2)
    {
        $sql="update ykienkhachhang set TTrang ='Đã đọc' where TTrang <>'Đã đọc'";
    }
    return mysqli_query($kn , $sql);
}

// Huy Don Hang
function Huydon($kn,$ma)
{
    $sql ="update donhang set TTrang ='Đã Bị Hủy' where MaDH ='".$ma."'";
    return  mysqli_query($kn , $sql);
}

// Chinh Sua Thong Tin San Pham
//
//Lay Ra Thong Tin San Pham THeo Ma San Pham De Chinh Sua San Pham
function SanphamMa($kn,$ma)
{
    $sql ="select * from sanpham where MaSP='".$ma."'";
    return  mysqli_query($kn , $sql);
}
function SuaSP($kn,$ma,$Hinh,$Ten,$Sl,$Mota,$MaL,$Gia,$a)
{
    if($a==1)
    {
        $sql ="update SANPHAM set Hinh_SP='".$Hinh."', Mo_ta='".$Mota."' ,sl =".$Sl.",TenSP='".$Ten."',MaL='".$MaL."',Gia_Cu=".$Gia.",TgThem= Now() where MaSP='".$ma."'";
    }
    if($a==2)
    {
        $sql ="update SANPHAM set  Mo_ta='".$Mota."' ,sl =".$Sl.",TenSP='".$Ten."',MaL='".$MaL."',Gia_Cu=".$Gia.",TgThem= Now() where MaSP='".$ma."'";
    }
   return mysqli_query($kn , $sql);
}
//

// Tien Tong Thu Nhap
function TongTien($kn)
{
    $sql="select sum(Tien) as t FROM `donhang` WHERE TTrang='Đã xác Nhận'";
    return  mysqli_query($kn , $sql);
}

// Tim Kiem San Pham
function Search_sp($kn,$ten,$loai,$a,$n)
{
    if($n ==-1)
    {
        if($a==1)
        {
            $sql ="select * from sanpham where TenSP like '".$ten."%'  order by TgThem desc ";
        }
        if($a==2)
        {
            $sql ="select * from sanpham where MaL = '".$loai."'  order by TgThem desc ";
        }
        if($a==3)
        {
            $sql ="select * from sanpham where MaL = '".$loai."' and TenSP like '".$ten."%'  order by TgThem desc ";
        }   
    }
    else
    {
        if($a==1)
        {
            $sql ="select * from sanpham where TenSP like '".$ten."%'  order by TgThem desc limit ".$n.",".biensanpham;
        }
        if($a==2)
        {
            $sql ="select * from sanpham where MaL = '".$loai."'  order by TgThem desc limit ".$n.",".biensanpham;
        }
        if($a==3)
        {
            $sql ="select * from sanpham where MaL = '".$loai."' and TenSP like '".$ten."%'  order by TgThem desc limit ".$n.",".biensanpham;
        }
    }
    return  mysqli_query($kn , $sql);
}

//Ham Dem So Trang
function Dem($ro,$bien)
{
    $dem = $ro / $bien;
    if($dem>1)
    {
        if($ro%$bien ==0)
        {
            $dem = $dem;
        }
        else
        {
            $dem = (($ro -($ro%$bien)) /$bien)+1;
        }
    }
    else
    {
        $dem =1;
    }
    return $dem;
}

//Search Đơn hàng
function Search_dh($kn,$tt,$ma,$a,$n)
{
    if($n ==-1)
    {
        if($a==1)
        {
            $sql ="select * from donhang where TTrang = '".$tt."'  order by  TgLap desc ";
        }
        if($a==2)
        {
            $sql ="select * from donhang where MaKH = '".$ma."' and TTrang != 'Đã Bị Hủy'  order by  TgLap desc ";
        }
        if($a==3)
        {
            $sql ="select * from donhang where TTrang = '".$tt."' and MaKH = '".$ma."' order by  TgLap desc ";
        }   
    }
    else
    {
        if($a==1)
        {
            $sql ="select * from donhang where TTrang = '".$tt."'  order by  TgLap desc limit ".$n.",".biendonhang;
        }
        if($a==2)
        {
            $sql ="select * from donhang where MaKH = '".$ma."' and TTrang != 'Đã Bị Hủy'  order by  TgLap desc limit ".$n.",".biendonhang;
        }
        if($a==3)
        {
            $sql ="select * from donhang where TTrang = '".$tt."' and MaKH = '".$ma."' order by  TgLap desc limit ".$n.",".biendonhang;
        }
    }
    return  mysqli_query($kn , $sql);
}

//Hiện Đơn Đã hủy
function donhuy($kn,$n)
{
    if($n==-1)
    {
        $sql ="select * from donhang where TTrang = 'Đã Bị Hủy' order by TgLap desc";
    }
    else
    {
        $sql ="select * from donhang where TTrang = 'Đã Bị Hủy' order by TgLap desc limit ".$n.",".biendonhang;
    }
    return  mysqli_query($kn , $sql);
}

//Cap Nhat Lai So Luong San Pham Trong Kho Sau Huy Don
function Up_Sl($kn,$ma,$sl)
{
    $sql ="update sanpham set Sl=Sl+".$sl." Where MaSP='".$ma."'";
    mysqli_query($kn , $sql);
}

//Ẩn Sản Phẩm
function AnSP($kn,$ma)
{
    $sql ="update sanpham set TTrang='Xóa' Where MaSP='".$ma."'";
    mysqli_query($kn , $sql);
}

function logout()
{
    if (isset($_SESSION['user']) && isset($_SESSION['quyen'])) {
        unset($_SESSION['user']);
        unset($_SESSION['quyen']);
    }
    header("location:login.php");
}
//clickpage can sua , Them và Xóa Giá Sẽ trả ve gia mac dinh dong 190(dung SanPhamMa) !!!!! 
?>