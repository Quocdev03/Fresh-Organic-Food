<?php
//Thanh Search
if(!isset($_GET["donhuy"]))
{
    require "php/sea_dh.php";
}


// Bien Limit Theo Trang
if (isset($_GET["page"]))
{
    $n =$_GET["page"];
    $n =$n*biendonhang-biendonhang;
    $sopage= $n;
}
else
{
    $sopage= 0;
}

//Hien Thi Theo Tim Kiem
if(isset($_GET["MaKH_sea"]))
{
    $ma=$_GET["MaKH_sea"];
    $tt=$_GET["TTrang"];
    if($ma != "" and $tt == 0)
        {
            $re=Search_dh($conn,$tt,$ma,2,$sopage);
            $rew=Search_dh($conn,$tt,$ma,2,-1);
        }
    else if($ma == "" and $tt != 0)
        {
            $re=Search_dh($conn,$tt,$ma,1,$sopage);
            $rew=Search_dh($conn,$tt,$ma,1,-1);
            
        }
    else if($ma != "" and $tt != 0)
        {
            $re=Search_dh($conn,$tt,$ma,3,$sopage);
            $rew=Search_dh($conn,$tt,$ma,3,-1);
        }
        else
        {
            $re = donhang($conn,$sopage);
            $rew = donhang($conn,-1);
        }
}
else if(isset($_GET["donhuy"])) //Hien Thi Don Huy
{
    $re=donhuy($conn,$sopage);
    $rew=donhuy($conn,-1);
}
else //Hien Thi Full
{
    $re = donhang($conn,$sopage);
    $rew = donhang($conn,-1);
}


// Dem So Trang
$ro = mysqli_num_rows($rew);
$dem=Dem($ro,biendonhang);
?>

<div class="body-sp">
    <form action="./Insert.php" method= "post">
        <div class="check">
            <div>
                <button type="submit" name="duyet">Duyệt Hàng Loạt</button>
            </div>
            <?php 
            if (!isset($_GET["donhuy"]))
            { ?> <div class="check_2">
                <button type="submit" name="huydon">Hủy đơn</button>
            </div>  <?php  }?>
            <div> <button type="submit" name="don_huy">Xem Đơn Đã Hủy</button></div>
            <div><button type="submit" name="huy1_"  id="button_n1"><img src="picture/Re.png" alt=""></button></a></div>
        </div>
        <div>
            <table class="table-1" cellspacing= 0>
                <tr>
                    <th><div>Đơn Hàng</div></th>
                    <th><div>Khách Hàng</div></th>
                    <th><div>Tình Trạng</div></th>
                    <th><div>Duyệt Đơn</div></th>
                    <th><div>Thời gian</div></th>
                    <th><div>Giá</div></th>
                    <th><div></div></th>
                </tr>
                <?php
                    while ($row = mysqli_fetch_array($re))
                    { ?>
                        <tr>
                            <td >
                                <div class="See">
                                    <div><?php echo $row["MaDH"]  ?></div>
                                    <div><a href="index.php?url=<?php echo $_GET["url"] ;if(isset($_GET["page"])){?>&page=<?php echo $_GET["page"];}?>&iddh=<?php echo $row["MaDH"]; if(isset($_GET["donhuy"])){?>&donhuy=yes<?php }  ?>">Xem</a></div>
                                </div>
                            </td>
                            <td >
                                <div class="See">
                                    <div><?php echo $row["MaKH"]  ?></div>
                                    <div class="kd"><a href="index.php?url=<?php echo $_GET["url"] ;if(isset($_GET["page"])){?>&page=<?php echo $_GET["page"];}?>&idkh=<?php echo $row["MaKH"]; ?>">Xem</a></div>
                                </div>
                            </td>
                            <td><?php echo $row["TTrang"]  ?></td>
                            <td class="td">
                                <?php
                                if($row["TTrang"]=="Chưa Xác Nhận")
                                { ?>
                                    <button type="submit" name="duyet1" value="<?php echo $row["MaDH"]; ?>"><div> Duyệt</div></button>
                        <?php   }
                                ?>
                                <?php
                                if($row["TTrang"]=="Đã Xác Nhận")
                                { ?>
                                <div><img src="picture/tick1.png" alt=""></div>
                        <?php   }
                                ?>
                                <?php
                                if($row["TTrang"]=="Đã Bị Hủy")
                                { ?>
                                <div><img src="picture/X1.png" alt=""></div>
                        <?php   }
                                ?>
                            </td>
                            <td><?php echo $row["TgLap"]  ?></td>
                            <td><?php echo $row["Tien"]  ?></td>
                            <td class="td">
                                <?php
                                if($row["TTrang"]<>"Bị hủy")
                                { ?>
                                    <input type="checkbox" name="huy[]" value="<?php echo $row["MaDH"] ;?>">
                        <?php   }
                                ?>
                        </tr>  <?php
                    } ?>
            </table>
        </div>
        
        <?php 
        if(isset($_GET["idkh"]))
        {
            require "php/infokh.php"; // Hien Thi Thong Tin Tung Khach Hang
        }
        if(isset($_GET["iddh"]))
        {
            require "php/infohd.php"; //Hien Thi Thong Tin Tung Don Hang
        }
        require "php/clickpage.php";  //Hien thi clickpage
        ?>
    </form>
</div>
