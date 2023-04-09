<body>
   <div class="wrapper">
      <div class="adminProduct">
         <div class="container">
            <div class="adminProduct-main">
               <!-- form nhập thông tin sản phẩm -->
               <form action="addproduct.php" method="post">
                  <input type="text" name="MaSP" placeholder="Mã sản phẩm"><br>
                  <input type="text" name="TenSP" placeholder="Tên sản phẩm"><br>
                  <input type="text" name="Hinh_sp" placeholder="Đường dẫn hình ảnh"><br>
                  <input type="text" name="Sl" placeholder="Số lượng"><br>
                  <input type="text" name="MaL" placeholder="Mã loại"><br>
                  <input type="text" name="Gia" placeholder="Giá"><br>
                  <input type="submit" name="submit" value="Thêm sản phẩm">
               </form>
            </div>
         </div>
      </div>
   </div>
</body>