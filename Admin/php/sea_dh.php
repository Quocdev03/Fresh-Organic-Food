<form action="" method="post" id="search-dh">
    <div>
    <select id="sea_ttrang" name="sea_ttrang">
        <option value=0>Tình Trạng</option>
        <option value="Chưa Xác Nhận">Chưa Xác Nhận</option>
        <option value="Đã Xác Nhận">Đã Xác Nhận</option>
    </select>
    <input type="text" name="makh" placeholder="MaKH">
    <button type="submit" name="search_">Search</button>
    <button type="submit" name="huy_">Hủy</button>
    </div>
</form>

<?php
//Nut Tim Kiem
if(isset($_POST["search_"]))
{
    $tt =$_POST["sea_ttrang"];
    $ma =$_POST["makh"];
    header("Location: index.php?url=donhang&MaKH_sea=".$ma."&TTrang=".$tt);
}

//Nut Huy Tim Kiem
if(isset($_POST["huy_"]))
{
    header("Location: index.php?url=donhang");
}
?>