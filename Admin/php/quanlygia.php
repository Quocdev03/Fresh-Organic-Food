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

?>
<div class="body-sp">
    <form action="./gia.php" method= "post">
        <div class="down">
            <div >
                <label>Giá</label>
                <input  type="text" name="gia">
            </div>
            <div>
            <button type="submit" name="chinh">Chỉnh giá</button>
            </div>
            <div >
            <button type="submit" name="xoag">Xóa giá</button>
            </div>
        </div>

        <div>
            <table class="table-3" cellspacing= 0>
                <tr>
                    <th><div>Hình ảnh</div></th>
                    <th><div>Tên</div></th>
                    <th><div>Loại</div></th>
                    <th><div>Giá</div></th>
                    <th><div>Giá Mới</div></th>
                    <th><div></div></th>
                </tr>
                <?php
                    while ($row = mysqli_fetch_array($re))
                    { ?>
                        <tr>
                            <!-- Hinh -->
                            <td><img src="../Images/product/<?php echo $row["Hinh_sp"]?>" alt=""></td>
                            <td><?php echo $row["TenSP"]  ?></td>
                            <td><?php echo $row["MaL"]  ?></td>
                            <td><?php echo $row["Gia_Cu"]  ?></td>
                            <th><div> <?php echo $row["Gia_Moi"]  ?></div></th>
                            <td><input type="checkbox" name="checkg[]" value=<?php echo $row["MaSP"] ;?>></td>
                        </tr>  <?php
                    } ?>
            </table>
        </div>
        <?php require "php/clickpage.php"; //Hien thi clickpage ?>
    </form>
</div>
