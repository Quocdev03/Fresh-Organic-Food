<?php
$re = loai($conn); //Lay Ra Cac Loai San Pham
?>
<form action="" method="post" id="Search">
    <div>
        <input type="text" name="Sea_tensp" value="">
        <select id="sea_loai" name="sea_loai">
                        <option value=0>Loại Sản Phẩm</option>
                            <?php 
                            while($a= mysqli_fetch_array($re))
                            {
                                ?><option value=<?php echo $a["MaL"] ;?>><?php echo $a["MaL"] ;?></option> <?php
                            }
                            ?>
                        </select>
        <button type="submit" name="search">Search</button>
        <button type="submit" name="huy_search">Hủy</button>
    </div>
</form>

<?php

$get=$_GET["url"];
//Nut Tim Kiem
if(isset($_POST["search"]))
{
    $ten =$_POST["Sea_tensp"];
    $loai =$_POST["sea_loai"];
    header("Location: index.php?url=".$get."&tensp=".$ten."&loaisp=".$loai);
}

//Nut Huy Tim Kiem
if(isset($_POST["huy_search"]))
{
    header("Location: index.php?url=".$get);
}
?>


