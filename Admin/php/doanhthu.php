<?php
//Thanh Search
require "php/sea_sp.php";

// Bien Limit Theo Trang
if (isset($_GET["page"]))
{
    $n =$_GET["page"];
    $n =$n*biensanpham-biensanpham;
    $sopage= $n;
}
else
{
    $sopage= 0;
}

//Hien Thi Theo Tim Kiem
if(isset($_GET["tensp"]))
{
    $ten=$_GET["tensp"];
    $loai=$_GET["loaisp"];
    if($ten != "" and $loai == 0)
        {
            $re=Search_sp($conn,$ten,$loai,1,$sopage);
            $rew=Search_sp($conn,$ten,$loai,1,-1);
        }
        else if($ten == "" and $loai != 0)
        {
            $re=Search_sp($conn,$ten,$loai,2,$sopage);
            $rew=Search_sp($conn,$ten,$loai,2,-1);
            
        }
        else if($ten != "" and $loai != 0)
        {
            $re=Search_sp($conn,$ten,$loai,3,$sopage);
            $rew=Search_sp($conn,$ten,$loai,3,-1);
        }
    else
    {
        $re = sanpham($conn,$sopage);
        $rew = sanpham($conn,-1);
    }
}
else //Hien Thi Full
{
    $re = sanpham($conn,$sopage);
    $rew = sanpham($conn,-1);
}

// Dem So Trang
$ro = mysqli_num_rows($rew);
$dem=Dem($ro,biensanpham);

//Tinh Tong Thu Nhap
$t = TongTien($conn);
$kiki = mysqli_fetch_array($t);
$tien = $kiki["t"];
?>
<div class="body-sp">
    <form action="" method="post">
        <div class="down">
            <div>
                <button type="submit" name ="To_Tien" >Tổng Tiền</button>
            </div>
            <?php
           if(isset($_POST["To_Tien"]))
           { ?>
            <div>
            <?php echo $tien; ?>
            </div>
            <?php   } ?>
        </div>

        <div>
            <table class="table" cellspacing= 0>
                <tr>
                    <th><div>Hình ảnh</div></th>
                    <th><div>Tên</div></th>
                    <th><div>Sl_kho</div></th>
                    <th><div>Sl-dangxuly</div></th>
                    <th><div>Sl_ban</div></th>
                    
                </tr>
                <?php
                    while ($row = mysqli_fetch_array($re))
                    { 
                        $b = $row["MaSP"];
                        $xn = Sl_xacnhan($conn,$b);
                        $ro=mysqli_fetch_array($xn);
                        $ban = doanhthu($conn,$b);
                        $raw=mysqli_fetch_array($ban);
                        if(isset($ro["Sl_dxn"]))
                        {
                            $sl_dxn = $ro["Sl_dxn"];
                        }
                        else
                        {
                            $sl_dxn=0;
                        }
                        if(isset($raw["Sl_ban"]))
                        {
                            $sl_ban = $raw["Sl_ban"];
                        }
                        else
                        {
                            $sl_ban=0;
                        }
                        if(isset($raw["To_tien"]))
                        {
                            $ttien = $raw["To_tien"];
                        }
                        else
                        {
                            $ttien=0;
                        }
                        
                        ?>
                        <tr>
                            <!-- Hinh -->
                            <td><img src="../Images/product/<?php echo $row["Hinh_sp"]?>" alt=""></td>  
                            <td><?php echo $row["TenSP"]  ?></td>
                            <td><?php echo $row["Sl"]  ?></td>
                            <td><?php echo $sl_dxn;  ?></td>
                            <td><?php echo $sl_ban;  ?></td>
                            
                        </tr>  <?php
                    } ?>
            </table>
        </div>
        <?php require "php/clickpage.php"; //Hien thi clickpage ?>
    </form>
</div>
