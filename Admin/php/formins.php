<?php
$re = loai($conn); // Hien Thi Cac Loai San Pham
?>

<form action="./Insert.php" method= "post" class="b1" enctype="multipart/form-data">
    <div class="form">
        <div class="fo-text">
            <div> Thêm Sản Phẩm </div>
            <div><a href="index.php?url=sanpham<?php if(isset($_GET["page"])){?>&page=<?php echo $_GET["page"];}?>">X</a></div>
        </div>
        <div class="fo-body"> 
            <div class="fo-body1">
                <div class="fo-body1-1">
                    <div>
                        <label for="Ten">Tên Sản Phẩm:</label>
                        <input type="text" name ="ten" id="ten" placeholder="Ten" maxlength="50">
                    </div>
                    <div>
                        <label for="loai">Loại Sản Phẩm:</label>
                        <select id="Loai" name="loai" >
                        <option value=0>Chọn Loai San Pham</option>
                            <?php 
                            while($a= mysqli_fetch_array($re))
                            {
                                ?><option value=<?php echo $a["MaL"] ;?>><?php echo $a["MaL"] ;?></option> <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                    <label for="image">Hình Sản Phẩm</label>
                    <div>
                        <input type="file" name="image" id="image" placeholder="Chọn hinh san pham">
                    </div>
                    </div>
                </div>
                <div>
                    <label for="mota">Mô Tả:</label>
                    <input type="textarea" name="mota" id="mota" maxlength="100">
                </div>
            </div>
            <div class="fo-body2">
                <div>
                    <label for="sl">Số Lượng:</label>
                    <input type="number" name="sl" id="sl" placeholder="So luong">
                </div>
                <div>
                    <label for="gia">Giá</label>
                    <input type="number" name="gia" id="gia" placeholder="Gia">
                </div>
            </div>
        </div>
        <div class="fo-bu"><button type="submit" name="them">Thêm</button></div>
    </div>
</form>


