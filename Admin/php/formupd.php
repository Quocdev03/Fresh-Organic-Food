<?php
$b= mysqli_fetch_array($h);
$mt= $b["Mo_ta"]; // Dat Bien Cho Mo Ta
?>
<form action="./Insert.php" method= "post" class="b1"  enctype="multipart/form-data">
    <div class="form">
        <div class="fo-text">
            <div> Thêm Sản Phẩm </div>
            <div><a href="index.php?url=sanpham<?php if(isset($_GET["page"])){?>&page=<?php echo $_GET["page"];}?>">X</a></div>
        </div>
        <div class="fo-bo"> 
            <div class="fo-body1">
                <div class="fo-body1-2">
                    <div>
                        <label for="Ten">Tên Sản Phẩm:</label>
                        <input type="text" name ="ten" id="ten" placeholder="Ten" value="<?php echo $b["TenSP"] ;?>"  maxlength="50">
                    </div>
                    <div>
                        <label for="Loai">Loại Sản Phẩm:</label>
                        <select id="Loai" name="loai" >
                            <option value=<?php echo $b["MaL"] ;?>><?php echo $b["MaL"] ;?>
                            <?php 
                            while($a= mysqli_fetch_array($re))
                            {
                                ?><option value=<?php echo $a["MaL"] ;?>><?php echo $a["MaL"] ;?></option> <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <div>
                            <div>
                                <!-- Hinh -->
                                <img src="../Images/product/<?php echo $b["Hinh_sp"]?>" alt="">
                            </div>
                            <div class=update-1-2>
                                <label for="image">Hình Mới</label>
                                <div>
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="mota">Mô Tả:</label>
                    <input type="text" name="mota" id="mota" value=" <?php echo $mt;?>" maxlength="100">
                </div>
            </div>
            <div class="fo-body2">
                <div>
                    <label for="so luong">Số Lượng</label>
                    <input type="text" name="sl" id="sl" placeholder="So luong" value=<?php echo $b["Sl"] ;?>>
                </div>
                <div>
                    <label for="Gia">Giá</label>
                    <input type="text" name="gia" id="gia" placeholder="Gia" value=<?php echo $b["Gia_Cu"] ;?>>
                </div>
            </div>
        </div>
        <div class="fo-bu"><button type="submit" name="updatesp" value=<?php echo $b["MaSP"] ;?>>Sửa</button></div>
    </div>
</form>