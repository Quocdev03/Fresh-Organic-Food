<?php
if(isset($_GET["idkh"]))
{
    $id =$_GET["idkh"];
    $re = khachhang($conn,$id);
    $ro = mysqli_fetch_array($re);
}
?>
<div class="info">
        <div class="XX">
            <div class="X1">THÔNG TIN KHÁCH HÀNG</div>
            <div class="X"><a href="index.php?<?php if(isset($_GET["url"])){?>url=<?php echo $_GET["url"];} if(isset($_GET["page"])){?>&page=<?php echo $_GET["page"];}?>">X</a></div>
        </div>
        <div class="info_KH1">
            <div>Tên Khách Hàng   :    <?php echo $ro["HoTen"]; ?></div>
            <div>Địa Chỉ  :  <?php echo $ro["DiaChi"]; ?></div>
            <div>Ngày Sinh  :  <?php echo $ro["NgaySinh"]; ?></div>
            <div>SDT  :  <?php echo $ro["Sdt"]; ?></div>
            <div>Email  :  <?php echo $ro["Email"]; ?></div>
        </div>
 </div>