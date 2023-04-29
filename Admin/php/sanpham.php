<?php
//Thanh Search
require "php/sea_sp.php";

//Nut Xoa
if(isset($_POST["delete"]))
{
    if(isset($_POST["check"]))
    {
        foreach($_POST["check"] as $value)
        {
            try{
                $k =XoaSP($conn,$value);
                header("Refresh:0");
            }
            catch(Exception $e)
            {
                $an =AnSP($conn,$value);
            }
        }
    }
}

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
        else //Hien Thi Full
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
    <form  method= "post" >
        <div class="funcsp">
            <a href="index.php?url=sanpham&form=1">Thêm</a>
            <button type="submit" name="delete" >Xóa</button>
            <div>
                <button type="submit" name="update" >Sửa</button>
                <input type="text" name="update_n" placeholder="ID">
            </div>
        </div>
        <div>
            <table class="table" cellspacing= 0>
                <tr>
                    <th><div>ID</div></th>
                    <th><div>Hình ảnh</div></th>
                    <th><div>Tên</div></th>
                    <th><div>Số lượng</div></th>
                    <th><div>Mô tả</div></th>
                    <th><div>Loại</div></th>
                    <th><div>Giá</div></th>
                    <th><div></div></th>
                </tr>
                <?php
                    while ($row = mysqli_fetch_array($re))
                    { ?>
                        <tr>
                        
                            <!-- Hinh  picture/SP/ -->
                            <th><?php echo $row["MaSP"]  ?></th>
                            <td><img src="../Images/product/<?php echo $row["Hinh_sp"]?>" alt=""></td>
                            <td><?php echo $row["TenSP"]  ?></td>
                            <td><?php echo $row["Sl"]  ?></td>
                            <td><?php echo $row["Mo_ta"]  ?></td>
                            <td><?php echo $row["MaL"]  ?></td>
                            <td><?php echo $row["Gia_Cu"]  ?></td>
                            <td><input type="checkbox" name="check[]" value="<?php echo $row["MaSP"] ;?>"></td>
                        </tr>  <?php
                    } ?>
            </table>
        </div>
        <?php require "php/clickpage.php" //Hien thi clickpage; 
            ?>
    </form>
    <?php 
    // Mo Form Insert SP
    if(isset($_GET["form"]))
    {
        require "php/formins.php";
    }

    // Mo Form Update SP
    if(isset($_POST["update"]))
    {
        if($_POST["update_n"] <> "")
        {
            $luu = $_POST["update_n"];
            $ma =$luu;
            $re = loai($conn);
            $h = sanphamMa($conn,$ma);
            $a =mysqli_num_rows($h) ;
            if($a !=0)
            {
                require "php/formupd.php";
            }
        }
    }
    ?>
</div>
