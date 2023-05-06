<?php
require 'conn.php';
require 'function.php';
require 'session.php';

//Nut Them San Pham
if(isset($_POST["them"]))
{
    //update file
    $file = $_FILES["image"]['tmp_name'];
   $a=substr($_FILES["image"]['name'], -3);
   $date= date("YmdHis");
   $ima= $date.".".$a;
   $path = "../Images/product/".$ima;
//    $path = "picture/SP/".$ima;  //hinh
   move_uploaded_file($file, $path);

    $Name=$_POST["ten"];
    $Loai=$_POST["loai"];
    $Picture=$ima;
    $MoTa=$_POST["mota"];
    $SL=$_POST["sl"];
    $Gia=$_POST["gia"];
    echo $Loai;
    if($Picture !='' and $Name !='' and $SL !='' and $MoTa !='' and $Loai !='' and $Gia !='' and $_FILES["image"]['name'] !='')
    {
        $in = ThemSP($conn,$Picture,$Name,$SL,$MoTa,$Loai,$Gia);
        if($in === True)
        {
        header("Location: index.php?url=sanpham");
        }
        else
        {
         echo "Them san pham that bai";
        }
    }
    else
    {
        header("Location: index.php?url=sanpham");
    }
}

//Nut Duyet 1 Don
if(isset($_POST["duyet"]))
{
    Duyetdon($conn,'a',2);
    header("Location: index.php?url=donhang");
}

//Nut Duyet Full Don
if(isset($_POST["duyet1"]))
{
    $a =$_POST["duyet1"];
    Duyetdon($conn,$a,1);
    header("Location: index.php?url=donhang");
}

//Nut Huy Don
if(isset($_POST["huydon"]))
{
    if(isset($_POST["huy"]))
    {
        foreach($_POST["huy"] as $value)
        {
            Huydon($conn,$value);
            $lay=hoadon($conn,$value,-1);
            while($xuly=mysqli_fetch_array($lay))
            {
                $masp = $xuly["MaSP"];
                $sl=$xuly["sl"];
                Up_Sl($conn,$masp,$sl);
            }
            header("Location: index.php?url=donhang");
        }
    }
    else
    {
        header("Location: index.php?url=donhang");
    }
    
}

//Nut Sua San Pham
if(isset($_POST["updatesp"]))
{
    $masp= $_POST["updatesp"];
    $file = $_FILES["image"]['tmp_name'];
   $a=substr($_FILES["image"]['name'], -3);
   $date= date("YmdHis");
   $ima= $date.".".$a;
   $path = "../Images/product/".$ima;  //hinh
   move_uploaded_file($file, $path);

    $Name=$_POST["ten"];
    $Loai=$_POST["loai"];
    $Picture=$ima;
    $MoTa=$_POST["mota"];
    $SL=$_POST["sl"];
    $Gia=$_POST["gia"];
    if($Picture !='' and $Name !='' and $SL !='' and $MoTa !='' and $Loai !='' and $Gia !='')
    {
        if($_FILES["image"]['name'] != '')
        {
            $in = SuaSP($conn,$masp,$Picture,$Name,$SL,$MoTa,$Loai,$Gia,1);
        }
        else
        {
            $in = SuaSP($conn,$masp,$Picture,$Name,$SL,$MoTa,$Loai,$Gia,2);
        }
        if($in === True)
        {
        header("Location: index.php?url=sanpham");
        }
        else
        {
            echo "Them san pham that bai";
        }
    }
    else
    {
        header("Location: index.php?url=sanpham");
    }
}

//Nut Cac Don Huy
if(isset($_POST["don_huy"]))
{
    header("Location: index.php?url=donhang&donhuy=yes");
}
if(isset($_POST["huy1_"]))
{
    header("Location: index.php?url=donhang");
}
?> 
