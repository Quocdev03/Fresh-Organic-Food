<?php
if(isset($_GET["iddh"]))
{
    $id =$_GET["iddh"];
// Bien Limit Theo Trang
    if (isset($_GET["pagehd"]))
    {
        
        $n =$_GET["pagehd"];
        $n =$n*bienhoadon-bienhoadon;
        $sopage= $n;
    }
    else
    {
        $sopage= 0;
    }
    //Hien Thi Full
    $re = hoadon($conn,$id,$sopage);
    $rew = hoadon($conn,$id,-1);

    // Dem So Trang
    $ro = mysqli_num_rows($rew);
    $dem1=Dem($ro,biendonhang);
}
?>

<div class="info-1">
        <div class="XX">
            <div class="X1"> Thông Tin Đơn Hàng </div>
            <div class="X"><a href="index.php?url=donhang<?php if(isset($_GET["page"])){?>&page=<?php echo $_GET["page"];};  if(isset($_GET["donhuy"])){?>&donhuy=yes<?php } ?>">X</a></div>
        </div>
        <div class="info_hd">
        <table class="table-1" cellspacing= 0>
                <tr>
                    <th><div>Hình</div></th>
                    <th><div>Tên</div></th>
                    <th><div>Số lượng</div></th>
                </tr>
        <?php while( $ra = mysqli_fetch_array($re)) 
                { ?>
                <tr>
                    <!-- Hinh -->
                    <td><div><img src="../Images/product/<?php echo $ra["Hinh_sp"]?>" alt=""></div></td>
                    <td> <div><?php echo $ra["TenSP"]; ?> </div> </td>
                    <td> <div><?php echo $ra["sl"]; ?> </div></td>
                </tr>  
          <?php   }  ?>     
            </table>
        </div>
        <?php require "php/clickpage1.php";   //Hien thi clickpage?>
 </div>