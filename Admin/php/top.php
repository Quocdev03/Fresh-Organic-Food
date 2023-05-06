<div class="big">
   <div class="admin">
      ADMIN
   </div>
   <div class="item">
      <div class="top-left">
         <a href="../index.php">Đến WedSite</a>
      </div>
      <div class="top-right">
         <div class="left-1">
            <a href="index.php?url=danhgia">Các Đánh Giá</a>
         </div>
         <div class="left-2">
            <div class="logout">
               <div> Tài Khoản
                  <div class="logout_an">
                     <form action="" method="post">
                        <div>Tài Khoản : <?php echo $_SESSION['user']; ?></div>
                        <button type="submit" name="log_out">Đăng Xuất</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
if (isset($_POST["log_out"])) {
   logout();
}
?>